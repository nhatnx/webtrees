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

use Fisharebest\Webtrees\GedcomElements\AddressPostalCode;
use Fisharebest\Webtrees\GedcomElements\Change;
use Fisharebest\Webtrees\GedcomElements\ChangeDate;
use Fisharebest\Webtrees\GedcomElements\CustomElement;
use Fisharebest\Webtrees\GedcomElements\DateValue;
use Fisharebest\Webtrees\GedcomElements\EmptyElement;
use Fisharebest\Webtrees\GedcomElements\EventAttributeType;
use Fisharebest\Webtrees\GedcomElements\EventDescriptor;
use Fisharebest\Webtrees\GedcomElements\GedcomElementInterface;
use Fisharebest\Webtrees\GedcomElements\LanguageId;
use Fisharebest\Webtrees\GedcomElements\NoteStructure;
use Fisharebest\Webtrees\GedcomElements\PlaceHierarchy;
use Fisharebest\Webtrees\GedcomElements\PlaceName;
use Fisharebest\Webtrees\GedcomElements\ReligiousAffiliation;
use Fisharebest\Webtrees\GedcomElements\TimeValue;
use Fisharebest\Webtrees\GedcomElements\WebtreesUser;
use Fisharebest\Webtrees\GedcomElements\XrefLocation;
use Fisharebest\Webtrees\GedcomElements\XrefMedia;
use Fisharebest\Webtrees\GedcomElements\XrefSource;
use Fisharebest\Webtrees\I18N;

/**
 * Class CustomTagsGedcomL
 */
class CustomTagsGedcomL extends AbstractModule implements ModuleConfigInterface, ModuleCustomTagsInterface
{
    use ModuleConfigTrait;
    use ModuleCustomTagsTrait;

    /**
     * @return array<string,GedcomElementInterface>
     */
    public function customTags(): array
    {
        return [
            '_LOC'                => new EmptyElement(I18N::translate('Location')),
            '_LOC:NAME'           => new PlaceName(I18N::translate('Place')),
            '_LOC:NAME:DATE'      => new DateValue(I18N::translate('Date')),
            '_LOC:NAME:ABBR'      => new CustomElement(I18N::translate('Abbreviation')),
            '_LOC:NAME:ABBR:TYPE' => new CustomElement(I18N::translate('Type')),
            '_LOC:NAME:LANG'      => new LanguageId(I18N::translate('Language')),
            '_LOC:NAME:SOUR'      => new XrefSource(I18N::translate('Source')),
            '_LOC:TYPE'           => new CustomElement(I18N::translate('Type')),
            '_LOC:TYPE:_GOVTYPE'  => new CustomElement('GOV TYPE'),
            '_LOC:TYPE:DATE'      => new DateValue(I18N::translate('Date')),
            '_LOC:TYPE:SOUR'      => new XrefSource(I18N::translate('Source')),
            '_LOC:_POST'          => new AddressPostalCode(I18N::translate('Postal code')),
            '_LOC:_POST:DATE'     => new DateValue(I18N::translate('Date')),
            '_LOC:_POST:SOUR'     => new XrefSource(I18N::translate('Source')),
            '_LOC:MAP'            => new EmptyElement(I18N::translate('Map')),
            '_LOC:MAP:LATI'       => new PlaceHierarchy(I18N::translate('Latitude')),
            '_LOC:MAP:LONG'       => new PlaceHierarchy(I18N::translate('Longitude')),
            '_LOC:_MAIDENHEAD'    => new PlaceHierarchy('Maidenhead locator'),
            '_LOC:RELI'           => new ReligiousAffiliation('Religion'),
            '_LOC:EVEN'           => new EventDescriptor(I18N::translate('Event')),
            '_LOC:EVEN:TYPE'      => new EventAttributeType(I18N::translate('Type of event')),
            '_LOC:_LOC'           => new XrefLocation(I18N::translate('Location')),
            '_LOC:_LOC:TYPE'      => new CustomElement(I18N::translate('Type')),
            '_LOC:_LOC:DATE'      => new DateValue(I18N::translate('Date')),
            '_LOC:_LOC:SOUR'      => new XrefSource(I18N::translate('Source')),
            '_LOC:_DMGD'          => new CustomElement('Demographic data'),
            '_LOC:_DMGD:TYPE'     => new CustomElement(I18N::translate('Type')),
            '_LOC:_DMGD:DATE'     => new DateValue(I18N::translate('Date')),
            '_LOC:_DMGD:SOUR'     => new XrefSource(I18N::translate('Source')),
            '_LOC:_AIDN'          => new CustomElement('Administrative ID'),
            '_LOC:_AIDN:TYPE'     => new CustomElement(I18N::translate('Type')),
            '_LOC:_AIDN:DATE'     => new DateValue(I18N::translate('Date')),
            '_LOC:_AIDN:SOUR'     => new XrefSource(I18N::translate('Source')),
            '_LOC::OBJE'          => new XrefMedia(I18N::translate('Media object')),
            '_LOC::NOTE'          => new NoteStructure(I18N::translate('Note')),
            '_LOC::SOUR'          => new XrefSource(I18N::translate('Source')),
            '_LOC:CHAN'           => new Change(I18N::translate('Last change')),
            '_LOC:CHAN:DATE'      => new ChangeDate(I18N::translate('Date of last change')),
            '_LOC:CHAN:DATE:TIME' => new TimeValue(I18N::translate('Time')),
            '_LOC:CHAN:_WT_USER'  => new WebtreesUser(I18N::translate('Author of last change')), // *** webtrees

            /* TODO
            '...:ADDR:_NAME' =>
            'FAM:*:PLAC:_POST' =>
            'FAM:*:PLAC:_POST:DATE' =>
            'FAM:*:PLAC:_MAIDENHEAD' =>
            'FAM:*:PLAC:_GOV' =>
            'FAM:*:PLAC:_LOC' =>
            'INDI:RESI' =>
            'INDI:NAME_RUFNAME' =>
            'INDI:*:PLAC:_POST' =>
            'INDI:*:PLAC:_POST:DATE' =>
            'INDI:*:PLAC:_MAIDENHEAD' =>
            'INDI:*:PLAC:_GOV' =>
            'INDI:*:PLAC:_LOC' =>
            'INDI:SEX' => SEX+X
             */
        ];
    }

    /**
     * The application for which we are supporting custom tags.
     *
     * @return string
     */
    public function customTagApplication(): string
    {
        return 'GEDCOM-L';
    }
}
