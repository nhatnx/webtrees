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

use Fisharebest\Webtrees\GedcomElements\AddressEmail;
use Fisharebest\Webtrees\GedcomElements\CustomElement;
use Fisharebest\Webtrees\GedcomElements\GedcomElementInterface;
use Fisharebest\Webtrees\I18N;

/**
 * Class CustomTagsReunion
 */
class CustomTagsReunion extends AbstractModule implements ModuleConfigInterface, ModuleCustomTagsInterface
{
    use ModuleConfigTrait;
    use ModuleCustomTagsTrait;

    /**
     * @return array<string,GedcomElementInterface>
     *
     * @todo - These tags need context adding.
     */
    public function customTags(): array
    {
        return [
            'EMAL' => new AddressEmail(I18N::translate('Email address')),

            'INDI:CITN'  => new CustomElement(I18N::translate('Citizenship')),
            'INDI:_PURC' => new CustomElement('Land purchase'),
            'INDI:_SALE' => new CustomElement('Land sale'),
            'INDI:_MDCL' => new CustomElement(I18N::translate('Medical')),
            'INDI:_LEGA' => new CustomElement(I18N::translate('Legatee')),
        ];
    }

    /**
     * The application for which we are supporting custom tags.
     *
     * @return string
     */
    public function customTagApplication(): string
    {
        return 'Reunion™';
    }
}
