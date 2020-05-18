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

use Fisharebest\Webtrees\GedcomElements\CertaintyAssessment;
use Fisharebest\Webtrees\GedcomElements\CustomElement;
use Fisharebest\Webtrees\GedcomElements\DateValue;
use Fisharebest\Webtrees\GedcomElements\GedcomElementInterface;
use Fisharebest\Webtrees\GedcomElements\NamePersonal;
use Fisharebest\Webtrees\GedcomElements\NoteStructure;
use Fisharebest\Webtrees\GedcomElements\PlaceName;
use Fisharebest\Webtrees\GedcomElements\SourceMediaType;
use Fisharebest\Webtrees\GedcomElements\TextFromSource;
use Fisharebest\Webtrees\GedcomElements\XrefRepository;
use Fisharebest\Webtrees\GedcomElements\XrefSource;
use Fisharebest\Webtrees\I18N;

/**
 * Class CustomTagsGedcom53
 */
class CustomTagsGedcom53 extends AbstractModule implements ModuleConfigInterface, ModuleCustomTagsInterface
{
    use ModuleConfigTrait;
    use ModuleCustomTagsTrait;

    /**
     * @return array<string,GedcomElementInterface>
     */
    public function customTags(): array
    {
        return [
            'FAM:*:PLAC:SITE' => new CustomElement('Site'),
            'FAM:*:QUAY'      => new CertaintyAssessment(I18N::translate('Quality of data')),
            'FAM:*:*:QUAY'    => new CertaintyAssessment(I18N::translate('Quality of data')),
            'FAM:AUDIO'       => new CustomElement(I18N::translate('Audio')),
            'FAM:IMAGE'       => new CustomElement('Image'),
            'FAM:PHOTO'       => new CustomElement(I18N::translate('Photo')),
            'FAM:VIDEO'       => new CustomElement(I18N::translate('Video')),

            'INDI:BURI:PLAC:CEME'      => new CustomElement(I18N::translate('Cemetery')),
            'INDI:BURI:PLAC:CEME:PLOT' => new CustomElement('Burial plot'),
            'INDI:*:PLAC:SITE'         => new CustomElement('Site'),
            'INDI:*:QUAY'              => new CertaintyAssessment(I18N::translate('Quality of data')),
            'INDI:*:*:QUAY'            => new CertaintyAssessment(I18N::translate('Quality of data')),
            'INDI:AUDIO'               => new CustomElement(I18N::translate('Audio')),
            'INDI:IMAGE'               => new CustomElement('Image'),
            'INDI:PHOTO'               => new CustomElement(I18N::translate('Photo')),
            'INDI:VIDEO'               => new CustomElement(I18N::translate('Video')),
            'INDI:NAMS'                => new CustomElement(I18N::translate('Namesake')),
            'INDI:NAMR'                => new CustomElement(I18N::translate('Religious name')),
            'INDI:SIGN'                => new CustomElement('Signature'),

            'EVEN'         => new CustomElement('Event'),
            'EVEN:TYPE'    => new CustomElement('Type of event'),
            'EVEN:*:DATE'  => new DateValue('Date'),
            'EVEN:*:PLAC'  => new PlaceName('Place'),
            'EVEN:*:BROT'  => new PlaceName('Brother'),
            'EVEN:*:BUYR'  => new PlaceName('Buyer'),
            'EVEN:*:CHIL'  => new PlaceName('Child'),
            'EVEN:*:FATH'  => new PlaceName('Father'),
            'EVEN:*:GODP'  => new PlaceName('Godparent'),
            'EVEN:*:HEIR'  => new PlaceName('Heir'),
            'EVEN:*:HDOH'  => new PlaceName('Head of household'),
            'EVEN:*:HFAT'  => new PlaceName('Husband’s father'),
            'EVEN:*:HMOT'  => new PlaceName('Husband’s mother'),
            'EVEN:*:HUSB'  => new PlaceName('Husband'),
            'EVEN:*:INDI'  => new PlaceName('Individual'),
            'EVEN:*:INFT'  => new PlaceName('Informant'),
            'EVEN:*:MOTH'  => new PlaceName('Mother'),
            'EVEN:*:LEGA'  => new PlaceName('Legatee'),
            'EVEN:*:MBR'   => new PlaceName('Member'),
            'EVEN:*:PARE'  => new PlaceName('Parent'),
            'EVEN:*:PHUS'  => new PlaceName('Previous husband'),
            'EVEN:*:PWIF'  => new PlaceName('Previous wife'),
            'EVEN:*:OFFI'  => new PlaceName('Official'),
            'EVEN:*:RECO'  => new PlaceName('Recorder'),
            'EVEN:*:REL'   => new PlaceName('Relative'),
            'EVEN:*:SELR'  => new PlaceName('Seller'),
            'EVEN:*:SIBL'  => new PlaceName('Sibling'),
            'EVEN:*:SIST'  => new PlaceName('Sister'),
            'EVEN:*:SPOU'  => new PlaceName('Spouse'),
            'EVEN:*:TXPY'  => new PlaceName('Taxpayer'),
            'EVEN:*:WFAT'  => new PlaceName('Wife’s father'),
            'EVEN:*:WMOT'  => new PlaceName('Wife’s mother'),
            'EVEN:*:WIFE'  => new PlaceName('Wife'),
            'EVEN:*:WITN'  => new PlaceName('Witness'),
            'EVEN:*:AUDIO' => new CustomElement(I18N::translate('Audio')),
            'EVEN:*:IMAGE' => new CustomElement('Image'),
            'EVEN:*:PHOTO' => new CustomElement(I18N::translate('Photo')),
            'EVEN:*:VIDEO' => new CustomElement(I18N::translate('Video')),

            'EVEN:*:*:NAME' => new NamePersonal(I18N::translate('Name')),

            'HEAD:SCHEMA'                => new CustomElement(I18N::translate('Unknown')),
            'HEAD:SCHEMA:FAM'            => new CustomElement(I18N::translate('Family')),
            'HEAD:SCHEMA:FAM:_*'         => new CustomElement('Custom event'),
            'HEAD:SCHEMA:FAM:_*:LABL'    => new CustomElement('Label'),
            'HEAD:SCHEMA:FAM:_*:DEFN'    => new CustomElement('Definition'),
            'HEAD:SCHEMA:FAM:_*:ISA'     => new CustomElement('Type of event'),
            'HEAD:SCHEMA:FAM:*:_*'       => new CustomElement('Custom event'),
            'HEAD:SCHEMA:FAM:*:_*:LABL'  => new CustomElement('Label'),
            'HEAD:SCHEMA:FAM:*:_*:DEFN'  => new CustomElement('Definition'),
            'HEAD:SCHEMA:FAM:*:_*:ISA'   => new CustomElement('Type of event'),
            'HEAD:SCHEMA:INDI'           => new CustomElement(I18N::translate('Individual')),
            'HEAD:SCHEMA:INDI:_*'        => new CustomElement('Custom event'),
            'HEAD:SCHEMA:INDI:_*:LABL'   => new CustomElement('Label'),
            'HEAD:SCHEMA:INDI:_*:DEFN'   => new CustomElement('Definition'),
            'HEAD:SCHEMA:INDI:_*:ISA'    => new CustomElement('Type of event'),
            'HEAD:SCHEMA:INDI:*:_*'      => new CustomElement('Custom event'),
            'HEAD:SCHEMA:INDI:*:_*:LABL' => new CustomElement('Label'),
            'HEAD:SCHEMA:INDI:*:_*:DEFN' => new CustomElement('Definition'),
            'HEAD:SCHEMA:INDI:*:_*:ISA'  => new CustomElement('Type of event'),

            'REPO:CNTC'      => new CustomElement('Contact person'),
            'REPO:MEDI'      => new SourceMediaType(I18N::translate('Media type')),
            'REPO:CALN:ITEM' => new CustomElement('Item'),
            'REPO:CALN:SHEE' => new CustomElement('Sheet'),
            'REPO:CALN:PAGE' => new CustomElement('Page'),
            'REPO:REFN'      => new CustomElement('Reference number'),

            'SOUR:TYPE'                => new CustomElement('Type of source'),
            'SOUR:EVEN'                => new CustomElement('Source events'),
            'SOUR:PERI'                => new CustomElement('Date period'),
            'SOUR:RECO'                => new CustomElement('Recording agency?'),
            'SOUR:FIDE'                => new CustomElement('Fidelity'),
            'SOUR:CLAS'                => new CustomElement('Source classification'),
            'SOUR:CENS'                => new CustomElement('Census'),
            'SOUR:CENS:DATE'           => new CustomElement('Census'),
            'SOUR:CENS:LINE'           => new CustomElement('Line number'),
            'SOUR:CENS:DWEL'           => new CustomElement('Dwelling number'),
            'SOUR:CENS:FAMN'           => new CustomElement('Family number'),
            'SOUR:ORIG'                => new CustomElement('Originator'),
            'SOUR:ORIG:NAME'           => new CustomElement('Name'),
            'SOUR:ORIG:TYPE'           => new CustomElement('Type'),
            'SOUR:ORIG:NOTE'           => new CustomElement('Note'),
            'SOUR:PUBL:TYPE'           => new CustomElement('Type'),
            'SOUR:PUBL:NAME'           => new CustomElement('Name'),
            'SOUR:PUBL:PUBR'           => new CustomElement('Publisher'),
            'SOUR:PUBL:DATE'           => new CustomElement('Date'),
            'SOUR:PUBL:EDTN'           => new CustomElement('Edition'),
            'SOUR:PUBL:SERS'           => new CustomElement('Series'),
            'SOUR:PUBL:ISSU'           => new CustomElement('Issue'),
            'SOUR:PUBL:LCCN'           => new CustomElement('Library of Congress call number'),
            'SOUR:REPO'                => new XrefRepository('Repository'),
            'SOUR:REPO:NAME'           => new CustomElement('Name of vessel'),
            'SOUR:REPO:PORT'           => new CustomElement('Port'),
            'SOUR:REPO:PORT:ARVL'      => new CustomElement('Arrival'),
            'SOUR:REPO:PORT:ARVL:DATE' => new DateValue('Date'),
            'SOUR:REPO:PORT:ARVL:PLAC' => new PlaceName('Place'),
            'SOUR:REPO:DPRT:ARVL'      => new CustomElement('Departure'),
            'SOUR:REPO:DPRT:ARVL:DATE' => new DateValue('Date'),
            'SOUR:REPO:DPRT:ARVL:PLAC' => new PlaceName('Place'),
            'SOUR:REPO:TEXT'           => new TextFromSource(I18N::translate('Text')),
            'SOUR:REPO:NOTE'           => new NoteStructure(I18N::translate('Note')),
            'SOUR:AUDIO'               => new CustomElement(I18N::translate('Audio')),
            'SOUR:IMAGE'               => new CustomElement('Image'),
            'SOUR:PHOTO'               => new CustomElement(I18N::translate('Photo')),
            'SOUR:VIDEO'               => new CustomElement(I18N::translate('Video')),
            'SOUR:FILM'                => new CustomElement(I18N::translate('Microfilm')),
            'SOUR:STAT'                => new CustomElement('Search status'),
            'SOUR:STAT:DATE'           => new DateValue('Date'),
            'SOUR:REFS'                => new XrefSource('Referenced source'),
            'SOUR:QUAY'                => new CertaintyAssessment(I18N::translate('Quality of data')),
            'SOUR:TEXT'                => new TextFromSource(I18N::translate('Text')),
            'SOUR:CPLR'                => new CustomElement('Compiler'),
            'SOUR:XLTR'                => new CustomElement('Translator'),
            'SOUR:EDTR'                => new CustomElement('Editor'),
            'SOUR:INTV'                => new CustomElement('Interviewer'),
            'SOUR:INDX'                => new CustomElement('Indexed'),
            'SOUR:SEQU'                => new CustomElement('Sequence'),
        ];
    }

    /**
     * The application for which we are supporting custom tags.
     *
     * @return string
     */
    public function customTagApplication(): string
    {
        return 'GEDCOM 5.3';
    }
}
