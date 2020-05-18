<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2020 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace Fisharebest\Webtrees\Module;

use Fisharebest\Webtrees\GedcomElements\CustomElement;
use Fisharebest\Webtrees\GedcomElements\GedcomElementInterface;
use Fisharebest\Webtrees\I18N;

/**
 * Class CustomTagsPAF
 */
class CustomTagsPersonalAncestralFile extends AbstractModule implements ModuleConfigInterface, ModuleCustomTagsInterface
{
    use ModuleConfigTrait;
    use ModuleCustomTagsTrait;

    /**
     * @return array<string,GedcomElementInterface>
     *
     * @see http://wiki-de.genealogy.net/GEDCOM/_Nutzerdef-Tag
     */
    public function customTags(): array
    {
        return [
            'INDI:NAME:_ADPN' => new CustomElement(I18N::translate('Adopted name')),
            'INDI:NAME:_AKA'  => new CustomElement(I18N::translate('Also known as')),
            'INDI:NAME:_AKAN' => new CustomElement(I18N::translate('Also known as')),

            /////

            '_NAME'  => new CustomElement(I18N::translate('Mailing name')),
            'URL'    => new CustomElement(I18N::translate('URL')),
            '_URL'   => new CustomElement(I18N::translate('URL')),
            '_HEB'   => new CustomElement(I18N::translate('Hebrew')),
            '_SCBK'  => new CustomElement(I18N::translate('Scrapbook')),
            '_TYPE'  => new CustomElement(I18N::translate('Media type')),
            '_SSHOW' => new CustomElement(I18N::translate('Slide show')),
        ];
    }

    /**
     * The application for which we are supporting custom tags.
     *
     * @return string
     */
    public function customTagApplication(): string
    {
        return 'Personal Ancestral File™';
    }
}
