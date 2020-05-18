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
use Fisharebest\Webtrees\GedcomElements\XrefIndividual;
use Fisharebest\Webtrees\I18N;

/**
 * Class CustomTagsWebtrees
 */
class CustomTagsWebtrees extends AbstractModule implements ModuleConfigInterface, ModuleCustomTagsInterface
{
    use ModuleConfigTrait;
    use ModuleCustomTagsTrait;

    /**
     * @return array<string,GedcomElementInterface>
     */
    public function customTags(): array
    {
        // Many of these tags are not be created/used by webtrees - but we don't know which application creates them.
        return [
            'EMAI'        => new AddressEmail(I18N::translate('Email')),
            'INFL'        => new CustomElement(I18N::translate('Infant')),
            'LEGA'        => new CustomElement(I18N::translate('Legatee')),
            'SHARED_NOTE' => new CustomElement(I18N::translate('Shared note')),
            '_AKA'        => new CustomElement(I18N::translate('Also known as')),
            '_ASSO'       => new XrefIndividual(I18N::translate('Associate')),
            '_GEDF'       => new CustomElement(I18N::translate('GEDCOM file')),
            '_GODP'       => new CustomElement(I18N::translate('Godparent')),
            '_GOV'        => new CustomElement(/* I18N: https://gov.genealogy.net */ I18N::translate('GOV identifier')),
            '_HEB'        => new CustomElement(I18N::translate('Hebrew')),
            '_LOC'        => new CustomElement(I18N::translate('Location')),
            '_MARNM'      => new CustomElement(I18N::translate('Married name')),
            '_MARNM_SURN' => new CustomElement(I18N::translate('Married surname')),
            '_MILI'       => new CustomElement(I18N::translate('Military')),
            '_NAME'       => new CustomElement(I18N::translate('Mailing name')),
            '_RNAME'      => new CustomElement(I18N::translate('Religious name')),
            '_SSHOW'      => new CustomElement(I18N::translate('Slide show')),
            '_STAT'       => new CustomElement(I18N::translate('Marriage status')),
            '_WITN'       => new CustomElement(I18N::translate('Witness')),
        ];
    }

    /**
     * The application for which we are supporting custom tags.
     *
     * @return string
     */
    public function customTagApplication(): string
    {
        return 'webtrees™';
    }
}
