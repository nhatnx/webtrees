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
use Fisharebest\Webtrees\GedcomElements\CustomEvent;
use Fisharebest\Webtrees\GedcomElements\CustomFact;
use Fisharebest\Webtrees\GedcomElements\DateValue;
use Fisharebest\Webtrees\GedcomElements\GedcomElementInterface;
use Fisharebest\Webtrees\GedcomElements\PlaceName;
use Fisharebest\Webtrees\I18N;

/**
 * Custom tags created by Brother’s Keeper
 *
 * Class CustomTagsBrothersKeeper
 */
class CustomTagsBrothersKeeper extends AbstractModule implements ModuleConfigInterface, ModuleCustomTagsInterface
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
            'INDI:NAME:_ADPN'  => new CustomElement(I18N::translate('Adopted name')),
            'INDI:NAME:_AKAN'  => new CustomElement(I18N::translate('Also known as')),
            'INDI:NAME:_BIRN'  => new CustomElement(I18N::translate('Birth name')),
            'INDI:NAME:_CALL'  => new CustomElement('Called name'),
            'INDI:NAME:_CENN'  => new CustomElement('Census name'),
            'INDI:NAME:_CURN'  => new CustomElement('Current name'),
            'INDI:NAME:_FARN'  => new CustomElement(I18N::translate('Estate name')),
            'INDI:NAME:_FKAN'  => new CustomElement('Formal name'),
            'INDI:NAME:_FRKA'  => new CustomElement('Formerly known as'),
            'INDI:NAME:_GERN'  => new CustomElement('German name'),
            'INDI:NAME:_HEBN'  => new CustomElement(I18N::translate('Hebrew name')),
            'INDI:NAME:_HNM'   => new CustomElement(I18N::translate('Hebrew name')),
            'INDI:NAME:_INDG'  => new CustomElement('Indigenous name'),
            'INDI:NAME:_INDN'  => new CustomElement('Indian name'),
            'INDI:NAME:_LNCH'  => new CustomElement('Legal name change'),
            'INDI:NAME:_MARN'  => new CustomElement('Married name'),
            'INDI:NAME:_MARNM' => new CustomElement('Married name'),
            'INDI:NAME:_OTHN'  => new CustomElement('Other name'),
            'INDI:NAME:_RELN'  => new CustomElement('Religious name'),
            'INDI:NAME:_SHON'  => new CustomElement('Short name'),
            'INDI:NAME:_SLDN'  => new CustomElement('Soldier name'),
            'INDI:_ADPF'       => new CustomElement(I18N::translate('Adopted by father')),
            'INDI:_ADPM'       => new CustomElement(I18N::translate('Adopted by mother')),
            'INDI:_BRTM'       => new CustomEvent(I18N::translate('Brit milah')),
            'INDI:_BRTM:DATE'  => new DateValue(I18N::translate('Date of brit milah')),
            'INDI:_BRTM:PLAC'  => new PlaceName(I18N::translate('Place of brit milah')),
            'INDI:_EMAIL'      => new AddressEmail(I18N::translate('Email address')),
            'INDI:_EYEC'       => new CustomFact(I18N::translate('Eye color')),
            'INDI:_FRNL'       => new CustomElement(I18N::translate('Funeral')),
            'INDI:_HAIR'       => new CustomFact(I18N::translate('Hair color')),
            'INDI:_HEIG'       => new CustomFact(I18N::translate('Height')),
            'INDI:_INTE'       => new CustomElement(I18N::translate('Interment')),
            'INDI:_MEDC'       => new CustomFact(I18N::translate('Medical')),
            'INDI:_MILT'       => new CustomElement(I18N::translate('Military service')),
            'INDI:_NLIV'       => new CustomFact(I18N::translate('Not living')),
            'INDI:_NMAR'       => new CustomEvent(I18N::translate('Never married'), ['NOTE' => '0:M', 'SOUR' => '0:M']),
            'INDI:_PRMN'       => new CustomElement(I18N::translate('Permanent number')),
            'INDI:_TODO'       => new CustomElement(I18N::translate('Research task')),
            'INDI:_WEIG'       => new CustomFact(I18N::translate('Weight')),
            'INDI:_YART'       => new CustomEvent(I18N::translate('Yahrzeit')),
            'INDI:*:_EVN'      => new CustomElement('Event number'),

            'FAM:CHIL:_FREL' => new CustomElement('Relationship to father'),
            'FAM:CHIL:_MREL' => new CustomElement('Relationship to mother'),
            'FAM:_COML'      => new CustomEvent(I18N::translate('Common law marriage')),
            'FAM:_MARI'      => new CustomEvent(I18N::translate('Marriage intention')),
            'FAM:_MBON'      => new CustomEvent(I18N::translate('Marriage bond')),
            'FAM:_NMR'       => new CustomEvent(I18N::translate('Not married'), ['NOTE' => '0:M', 'SOUR' => '0:M']),
            'FAM:_PRMN'      => new CustomElement(I18N::translate('Permanent number')),
            'FAM:_SEPR'      => new CustomEvent(I18N::translate('Separated')),
            'FAM:_TODO'      => new CustomElement(I18N::translate('Research task')),
            'FAM:*:_EVN'     => new CustomElement('Event number'),

            // 1 XXXX
            // 2 _EVN ##
            // 1 ASSO @Xnnn@
            // 2 RELA Witness at event _EVN ##
        ];
    }

    /**
     * The application for which we are supporting custom tags.
     *
     * @return string
     */
    public function customTagApplication(): string
    {
        return 'Brother’s Keeper™';
    }
}
