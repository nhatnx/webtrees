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

namespace Fisharebest\Webtrees\Factories;

use Fisharebest\Webtrees\Contracts\ElementFactoryInterface;
use Fisharebest\Webtrees\GedcomElements\AddressCity;
use Fisharebest\Webtrees\GedcomElements\AddressCountry;
use Fisharebest\Webtrees\GedcomElements\AddressEmail;
use Fisharebest\Webtrees\GedcomElements\AddressFax;
use Fisharebest\Webtrees\GedcomElements\AddressLine;
use Fisharebest\Webtrees\GedcomElements\AddressLine1;
use Fisharebest\Webtrees\GedcomElements\AddressLine2;
use Fisharebest\Webtrees\GedcomElements\AddressLine3;
use Fisharebest\Webtrees\GedcomElements\AddressPostalCode;
use Fisharebest\Webtrees\GedcomElements\AddressState;
use Fisharebest\Webtrees\GedcomElements\AddressWebPage;
use Fisharebest\Webtrees\GedcomElements\AdoptedByWhichParent;
use Fisharebest\Webtrees\GedcomElements\Adoption;
use Fisharebest\Webtrees\GedcomElements\AdultChristening;
use Fisharebest\Webtrees\GedcomElements\AgeAtEvent;
use Fisharebest\Webtrees\GedcomElements\AncestralFileNumber;
use Fisharebest\Webtrees\GedcomElements\Annulment;
use Fisharebest\Webtrees\GedcomElements\ApprovedSystemId;
use Fisharebest\Webtrees\GedcomElements\AttributeDescriptor;
use Fisharebest\Webtrees\GedcomElements\AutomatedRecordId;
use Fisharebest\Webtrees\GedcomElements\Baptism;
use Fisharebest\Webtrees\GedcomElements\BasMitzvah;
use Fisharebest\Webtrees\GedcomElements\Birth;
use Fisharebest\Webtrees\GedcomElements\Blessing;
use Fisharebest\Webtrees\GedcomElements\Burial;
use Fisharebest\Webtrees\GedcomElements\CasteName;
use Fisharebest\Webtrees\GedcomElements\CauseOfEvent;
use Fisharebest\Webtrees\GedcomElements\Census;
use Fisharebest\Webtrees\GedcomElements\CertaintyAssessment;
use Fisharebest\Webtrees\GedcomElements\Change;
use Fisharebest\Webtrees\GedcomElements\ChangeDate;
use Fisharebest\Webtrees\GedcomElements\CharacterSet;
use Fisharebest\Webtrees\GedcomElements\ChildLinkageStatus;
use Fisharebest\Webtrees\GedcomElements\Christening;
use Fisharebest\Webtrees\GedcomElements\Confirmation;
use Fisharebest\Webtrees\GedcomElements\CopyrightFile;
use Fisharebest\Webtrees\GedcomElements\CopyrightSourceData;
use Fisharebest\Webtrees\GedcomElements\CountOfChildren;
use Fisharebest\Webtrees\GedcomElements\CountOfMarriages;
use Fisharebest\Webtrees\GedcomElements\Cremation;
use Fisharebest\Webtrees\GedcomElements\DateLdsOrd;
use Fisharebest\Webtrees\GedcomElements\DateValue;
use Fisharebest\Webtrees\GedcomElements\Death;
use Fisharebest\Webtrees\GedcomElements\DescriptiveTitle;
use Fisharebest\Webtrees\GedcomElements\Divorce;
use Fisharebest\Webtrees\GedcomElements\DivorceFiled;
use Fisharebest\Webtrees\GedcomElements\Emigration;
use Fisharebest\Webtrees\GedcomElements\EmptyElement;
use Fisharebest\Webtrees\GedcomElements\Engagement;
use Fisharebest\Webtrees\GedcomElements\EntryRecordingDate;
use Fisharebest\Webtrees\GedcomElements\EventAttributeType;
use Fisharebest\Webtrees\GedcomElements\EventDescriptor;
use Fisharebest\Webtrees\GedcomElements\EventOrFactClassification;
use Fisharebest\Webtrees\GedcomElements\EventsRecorded;
use Fisharebest\Webtrees\GedcomElements\EventTypeCitedFrom;
use Fisharebest\Webtrees\GedcomElements\FileName;
use Fisharebest\Webtrees\GedcomElements\FirstCommunion;
use Fisharebest\Webtrees\GedcomElements\Gedcom;
use Fisharebest\Webtrees\GedcomElements\ContentDescription;
use Fisharebest\Webtrees\GedcomElements\GedcomElementInterface;
use Fisharebest\Webtrees\GedcomElements\Form;
use Fisharebest\Webtrees\GedcomElements\GenerationsOfAncestors;
use Fisharebest\Webtrees\GedcomElements\GenerationsOfDescendants;
use Fisharebest\Webtrees\GedcomElements\Graduation;
use Fisharebest\Webtrees\GedcomElements\Immigration;
use Fisharebest\Webtrees\GedcomElements\LanguageId;
use Fisharebest\Webtrees\GedcomElements\LdsBaptism;
use Fisharebest\Webtrees\GedcomElements\LdsBaptismDateStatus;
use Fisharebest\Webtrees\GedcomElements\LdsChildSealing;
use Fisharebest\Webtrees\GedcomElements\LdsChildSealingDateStatus;
use Fisharebest\Webtrees\GedcomElements\LdsConfirmation;
use Fisharebest\Webtrees\GedcomElements\LdsEndowment;
use Fisharebest\Webtrees\GedcomElements\LdsEndowmentDateStatus;
use Fisharebest\Webtrees\GedcomElements\LdsSpouseSealing;
use Fisharebest\Webtrees\GedcomElements\LdsSpouseSealingDateStatus;
use Fisharebest\Webtrees\GedcomElements\Marriage;
use Fisharebest\Webtrees\GedcomElements\MarriageBanns;
use Fisharebest\Webtrees\GedcomElements\MarriageContract;
use Fisharebest\Webtrees\GedcomElements\MarriageLicence;
use Fisharebest\Webtrees\GedcomElements\MarriageSettlement;
use Fisharebest\Webtrees\GedcomElements\MarriageType;
use Fisharebest\Webtrees\GedcomElements\MultimediaFileReference;
use Fisharebest\Webtrees\GedcomElements\MultimediaFormat;
use Fisharebest\Webtrees\GedcomElements\NameOfBusiness;
use Fisharebest\Webtrees\GedcomElements\NameOfFamilyFile;
use Fisharebest\Webtrees\GedcomElements\NameOfProduct;
use Fisharebest\Webtrees\GedcomElements\NameOfRepository;
use Fisharebest\Webtrees\GedcomElements\NameOfSourceData;
use Fisharebest\Webtrees\GedcomElements\NamePersonal;
use Fisharebest\Webtrees\GedcomElements\NamePhoneticVariation;
use Fisharebest\Webtrees\GedcomElements\NamePieceGiven;
use Fisharebest\Webtrees\GedcomElements\NamePieceNickname;
use Fisharebest\Webtrees\GedcomElements\NamePiecePrefix;
use Fisharebest\Webtrees\GedcomElements\NamePieceSuffix;
use Fisharebest\Webtrees\GedcomElements\NamePieceSurname;
use Fisharebest\Webtrees\GedcomElements\NamePieceSurnamePrefix;
use Fisharebest\Webtrees\GedcomElements\NameRomanizedVariation;
use Fisharebest\Webtrees\GedcomElements\NameType;
use Fisharebest\Webtrees\GedcomElements\NationalIdNumber;
use Fisharebest\Webtrees\GedcomElements\NationOrTribalOrigin;
use Fisharebest\Webtrees\GedcomElements\Naturalization;
use Fisharebest\Webtrees\GedcomElements\NobilityTypeTitle;
use Fisharebest\Webtrees\GedcomElements\NoteRecord;
use Fisharebest\Webtrees\GedcomElements\NoteStructure;
use Fisharebest\Webtrees\GedcomElements\Occupation;
use Fisharebest\Webtrees\GedcomElements\OrdinanceProcessFlag;
use Fisharebest\Webtrees\GedcomElements\Ordination;
use Fisharebest\Webtrees\GedcomElements\PafUid;
use Fisharebest\Webtrees\GedcomElements\PedigreeLinkageType;
use Fisharebest\Webtrees\GedcomElements\PermanentRecordFileNumber;
use Fisharebest\Webtrees\GedcomElements\PhoneNumber;
use Fisharebest\Webtrees\GedcomElements\PhoneticType;
use Fisharebest\Webtrees\GedcomElements\PhysicalDescription;
use Fisharebest\Webtrees\GedcomElements\PlaceHierarchy;
use Fisharebest\Webtrees\GedcomElements\PlaceLatitude;
use Fisharebest\Webtrees\GedcomElements\PlaceLivingOrdinance;
use Fisharebest\Webtrees\GedcomElements\PlaceLongtitude;
use Fisharebest\Webtrees\GedcomElements\PlaceName;
use Fisharebest\Webtrees\GedcomElements\PlacePhoneticVariation;
use Fisharebest\Webtrees\GedcomElements\PlaceRomanizedVariation;
use Fisharebest\Webtrees\GedcomElements\Possessions;
use Fisharebest\Webtrees\GedcomElements\Probate;
use Fisharebest\Webtrees\GedcomElements\PublicationDate;
use Fisharebest\Webtrees\GedcomElements\ReceivingSystemName;
use Fisharebest\Webtrees\GedcomElements\RelationIsDescriptor;
use Fisharebest\Webtrees\GedcomElements\ReligiousAffiliation;
use Fisharebest\Webtrees\GedcomElements\RepositoryRecord;
use Fisharebest\Webtrees\GedcomElements\Residence;
use Fisharebest\Webtrees\GedcomElements\ResponsibleAgency;
use Fisharebest\Webtrees\GedcomElements\RestrictionNotice;
use Fisharebest\Webtrees\GedcomElements\Retirement;
use Fisharebest\Webtrees\GedcomElements\RoleInEvent;
use Fisharebest\Webtrees\GedcomElements\RomanizedType;
use Fisharebest\Webtrees\GedcomElements\ScholasticAchievement;
use Fisharebest\Webtrees\GedcomElements\SexValue;
use Fisharebest\Webtrees\GedcomElements\SocialSecurityNumber;
use Fisharebest\Webtrees\GedcomElements\SourceCallNumber;
use Fisharebest\Webtrees\GedcomElements\SourceData;
use Fisharebest\Webtrees\GedcomElements\SourceFiledByEntry;
use Fisharebest\Webtrees\GedcomElements\SourceJurisdictionPlace;
use Fisharebest\Webtrees\GedcomElements\SourceMediaType;
use Fisharebest\Webtrees\GedcomElements\SourceOriginator;
use Fisharebest\Webtrees\GedcomElements\SourcePublicationFacts;
use Fisharebest\Webtrees\GedcomElements\SourceRecord;
use Fisharebest\Webtrees\GedcomElements\SubmitterName;
use Fisharebest\Webtrees\GedcomElements\SubmitterRecord;
use Fisharebest\Webtrees\GedcomElements\SubmitterRegisteredRfn;
use Fisharebest\Webtrees\GedcomElements\SubmitterText;
use Fisharebest\Webtrees\GedcomElements\TempleCode;
use Fisharebest\Webtrees\GedcomElements\TextFromSource;
use Fisharebest\Webtrees\GedcomElements\TimeValue;
use Fisharebest\Webtrees\GedcomElements\TransmissionDate;
use Fisharebest\Webtrees\GedcomElements\UnknownElement;
use Fisharebest\Webtrees\GedcomElements\UserReferenceNumber;
use Fisharebest\Webtrees\GedcomElements\UserReferenceType;
use Fisharebest\Webtrees\GedcomElements\VersionNumber;
use Fisharebest\Webtrees\GedcomElements\WebtreesUser;
use Fisharebest\Webtrees\GedcomElements\WhereWithinSource;
use Fisharebest\Webtrees\GedcomElements\Will;
use Fisharebest\Webtrees\GedcomElements\XrefFamily;
use Fisharebest\Webtrees\GedcomElements\XrefIndividual;
use Fisharebest\Webtrees\GedcomElements\XrefMedia;
use Fisharebest\Webtrees\GedcomElements\XrefRepository;
use Fisharebest\Webtrees\GedcomElements\XrefSource;
use Fisharebest\Webtrees\GedcomElements\XrefSubmitter;
use Fisharebest\Webtrees\GedcomElements\XrefSubmission;
use Fisharebest\Webtrees\I18N;

use function preg_match;
use function strpos;

/**
 * Make a GEDCOM element.
 */
class ElementFactory implements ElementFactoryInterface
{
    /** @var null|array<string,GedcomElementInterface> */
    private $elements;

    /**
     * Create a GEDCOM element that corresponds to a GEDCOM tag.
     * Finds the correct element for all valid tags.
     * Finds a likely element for custom tags.
     *
     * @param string $tag - Colon delimited hierarchy, e.g. 'INDI:BIRT:PLAC'
     *
     * @return GedcomElementInterface
     */
    public function make(string $tag): GedcomElementInterface
    {
        return $this->elements()[$tag] ?? $this->findElementByWildcard($tag) ?? new UnknownElement($tag);
    }

    /**
     * @param string $tag
     *
     * @return GedcomElementInterface|null
     */
    private function findElementByWildcard(string $tag): ?GedcomElementInterface
    {
        foreach ($this->elements() as $tags => $element) {
            if (strpos($tags, '*') !== false) {
                $regex = '/^' . strtr($tags, ['*' => '[^:]+']) . '$/';

                if (preg_match($regex, $tag)) {
                    return $element;
                }
            }
        }

        return null;
    }

    /**
     * Register more elements.
     *
     * @param array<string,GedcomElementInterface> $elements
     */
    public function register(array $elements): void
    {
        $this->elements = array_merge($this->elements(), $elements);
    }

    /**
     * Association between GEDCOM tags and GEDCOM elements.
     * We can't initialise this in the constructor, as the I18N package isn't available then.
     *
     * @return array<string,GedcomElementInterface>
     */
    private function elements(): array
    {
        if ($this->elements === null) {
            // Custom tags are indicated with ***
            $this->elements = [
                'INDI'                     => new EmptyElement(I18N::translate('Individual')),
                'INDI:ADOP'                => new Adoption(I18N::translate('Adoption')),
                'INDI:ADOP:DATE'           => new DateValue(I18N::translate('Date of adoption')),
                'INDI:ADOP:PLAC'           => new PlaceName(I18N::translate('Place of adoption')),
                'INDI:ADOP:FAMC'           => new XrefFamily(I18N::translate('Adoptive parents')),
                'INDI:ADOP:FAMC:ADOP'      => new AdoptedByWhichParent(I18N::translate('Adoption')),
                'INDI:AFN'                 => new AncestralFileNumber(I18N::translate('Ancestral file number')),
                'INDI:ASSO'                => new XrefIndividual(I18N::translate('Associate')),
                'INDI:ASSO:RELA'           => new RelationIsDescriptor(I18N::translate('Relationship')),
                'INDI:ASSO:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'INDI:ALIA'                => new XrefIndividual(I18N::translate('Alias')),
                'INDI:ANCI'                => new XrefSubmitter(I18N::translate('Ancestors interest')),
                'INDI:BAPL'                => new LdsBaptism(I18N::translate('LDS baptism')),
                'INDI:BAPL:DATE'           => new DateLdsOrd(I18N::translate('Date of LDS baptism')),
                'INDI:BAPL:TEMP'           => new TempleCode(/* I18N: https://en.wikipedia.org/wiki/Temple_(LDS_Church)*/ I18N::translate('Temple')),
                'INDI:BAPL:PLAC'           => new PlaceLivingOrdinance(I18N::translate('Place of LDS baptism')),
                'INDI:BAPL:STAT'           => new LdsBaptismDateStatus(I18N::translate('Status')),
                'INDI:BAPL:STAT:DATE'      => new ChangeDate(I18N::translate('Status change date')),
                'INDI:BAPL:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'INDI:BAPM'                => new Baptism(I18N::translate('Baptism')),
                'INDI:BAPM:DATE'           => new DateValue(I18N::translate('Date of baptism')),
                'INDI:BAPM:PLAC'           => new PlaceName(I18N::translate('Place of baptism')),
                'INDI:BASM'                => new BasMitzvah(I18N::translate('Bat mitzvah')),
                'INDI:BASM:DATE'           => new BasMitzvah(I18N::translate('Date of bat mitzvah')),
                'INDI:BASM:PLAC'           => new DateValue(I18N::translate('Place of bat mitzvah')),
                'INDI:BARM'                => new PlaceName(I18N::translate('Bar mitzvah')),
                'INDI:BARM:DATE'           => new DateValue(I18N::translate('Date of bar mitzvah')),
                'INDI:BARM:PLAC'           => new PlaceName(I18N::translate('Place of bar mitzvah')),
                'INDI:BIRT'                => new Birth(I18N::translate('Birth')),
                'INDI:BIRT:DATE'           => new DateValue(I18N::translate('Date of birth')),
                'INDI:BIRT:FAMC'           => new XrefFamily(I18N::translate('Birth parents')),
                'INDI:BIRT:PLAC'           => new PlaceName(I18N::translate('Place of birth')),
                'INDI:BLES'                => new Blessing(I18N::translate('Blessing')),
                'INDI:BLES:DATE'           => new DateValue(I18N::translate('Date of blessing')),
                'INDI:BLES:PLAC'           => new PlaceName(I18N::translate('Place of blessing')),
                'INDI:BURI'                => new Burial(I18N::translate('Burial')),
                'INDI:BURI:DATE'           => new DateValue(I18N::translate('Date of burial')),
                'INDI:BURI:PLAC'           => new PlaceName(I18N::translate('Place of burial')),
                'INDI:CAST'                => new CasteName(I18N::translate('Caste')),
                'INDI:CENS'                => new Census(I18N::translate('Census')),
                'INDI:CENS:DATE'           => new DateValue(I18N::translate('Census date')),
                'INDI:CENS:PLAC'           => new PlaceName(I18N::translate('Census place')),
                'INDI:CHAN'                => new Change(I18N::translate('Last change')),
                'INDI:CHAN:DATE'           => new ChangeDate(I18N::translate('Date of last change')),
                'INDI:CHAN:DATE:TIME'      => new TimeValue(I18N::translate('Time')),
                'INDI:CHAN:_WT_USER'       => new WebtreesUser(I18N::translate('Author of last change')), // *** webtrees
                'INDI:CHR'                 => new Christening(I18N::translate('Christening')),
                'INDI:CHR:DATE'            => new DateValue(I18N::translate('Date of christening')),
                'INDI:CHR:PLAC'            => new PlaceName(I18N::translate('Place of christening')),
                'INDI:CHRA'                => new AdultChristening(I18N::translate('Adult christening')),
                'INDI:CHR:FAMC'            => new XrefFamily(I18N::translate('Godparents')),
                'INDI:CONF'                => new Confirmation(I18N::translate('Confirmation')),
                'INDI:CONF:DATE'           => new DateValue(I18N::translate('Date of confirmation')),
                'INDI:CONF:PLAC'           => new PlaceName(I18N::translate('Place of confirmation')),
                'INDI:CONL'                => new LdsConfirmation(I18N::translate('LDS confirmation')),
                'INDI:CONL:DATE'           => new DateLdsOrd(I18N::translate('Date of LDS confirmation')),
                'INDI:CONL:TEMP'           => new TempleCode(/* I18N: https://en.wikipedia.org/wiki/Temple_(LDS_Church)*/ I18N::translate('Temple')),
                'INDI:CONL:PLAC'           => new PlaceLivingOrdinance(I18N::translate('Place of LDS confirmation')),
                'INDI:CONL:STAT'           => new LdsSpouseSealingDateStatus(I18N::translate('Status')),
                'INDI:CONL:STAT:DATE'      => new ChangeDate(I18N::translate('Status change date')),
                'INDI:CONL:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'INDI:CREM'                => new Cremation(I18N::translate('Cremation')),
                'INDI:CREM:DATE'           => new Cremation(I18N::translate('Date of cremation')),
                'INDI:CREM:PLAC'           => new Cremation(I18N::translate('Place of cremation')),
                'INDI:DEAT'                => new Death(I18N::translate('Death')),
                'INDI:DEAT:CAUS'           => new CauseOfEvent(I18N::translate('Cause of death')),
                'INDI:DEAT:DATE'           => new DateValue(I18N::translate('Date of death')),
                'INDI:DEAT:PLAC'           => new PlaceName(I18N::translate('Place of death')),
                'INDI:DESI'                => new XrefSubmitter(I18N::translate('Descendants interest')),
                'INDI:DSCR'                => new PhysicalDescription(I18N::translate('Description')),
                'INDI:EDUC'                => new ScholasticAchievement(I18N::translate('Education')),
                'INDI:EDUC:AGNC'           => new ResponsibleAgency(I18N::translate('School or college')),
                'INDI:EMIG'                => new Emigration(I18N::translate('Emigration')),
                'INDI:EMIG:DATE'           => new DateValue(I18N::translate('Date of emigration')),
                'INDI:EMIG:PLAC'           => new PlaceName(I18N::translate('Place of emigration')),
                'INDI:ENDL'                => new LdsEndowment(I18N::translate('LDS endowment')),
                'INDI:ENDL:DATE'           => new DateLdsOrd(I18N::translate('Date of LDS endowment')),
                'INDI:ENDL:TEMP'           => new TempleCode(/* I18N: https://en.wikipedia.org/wiki/Temple_(LDS_Church)*/ I18N::translate('Temple')),
                'INDI:ENDL:PLAC'           => new PlaceLivingOrdinance(I18N::translate('Place of LDS endowment')),
                'INDI:ENDL:STAT'           => new LdsEndowmentDateStatus(I18N::translate('Status')),
                'INDI:ENDL:STAT:DATE'      => new ChangeDate(I18N::translate('Status change date')),
                'INDI:ENDL:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'INDI:EVEN'                => new EventDescriptor(I18N::translate('Event')),
                'INDI:EVEN:DATE'           => new DateValue(I18N::translate('Date of event')),
                'INDI:EVEN:PLAC'           => new PlaceName(I18N::translate('Place of event')),
                'INDI:EVEN:TYPE'           => new EventAttributeType(I18N::translate('Type of event')),
                'INDI:FACT'                => new AttributeDescriptor(I18N::translate('Fact')),
                'INDI:FACT:TYPE'           => new EventAttributeType(I18N::translate('Type of fact')),
                'INDI:FAMC'                => new XrefFamily(I18N::translate('Family as a child')),
                'INDI:FAMC:PEDI'           => new PedigreeLinkageType(I18N::translate('Relationship to parents')),
                'INDI:FAMC:STAT'           => new ChildLinkageStatus(I18N::translate('Status')),
                'INDI:FAMC:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'INDI:FAMS'                => new XrefFamily(I18N::translate('Family as a spouse')),
                'INDI:FCOM'                => new FirstCommunion(I18N::translate('First communion')),
                'INDI:FCOM:DATE'           => new DateValue(I18N::translate('Date of first communion')),
                'INDI:FCOM:PLAC'           => new PlaceName(I18N::translate('Place of first communion')),
                'INDI:GRAD'                => new Graduation(I18N::translate('Graduation')),
                'INDI:GRAD:AGNC'           => new ResponsibleAgency(I18N::translate('School or college')),
                'INDI:IDNO'                => new NationalIdNumber(I18N::translate('Identification number')),
                'INDI:IMMI'                => new Immigration(I18N::translate('Immigration')),
                'INDI:IMMI:DATE'           => new DateValue(I18N::translate('Date of immigration')),
                'INDI:IMMI:PLAC'           => new PlaceName(I18N::translate('Place of immigration')),
                'INDI:NAME'                => new NamePersonal(I18N::translate('Name')),
                'INDI:NAME:TYPE'           => new NameType(I18N::translate('Type of name')),
                'INDI:NAME:NPFX'           => new NamePiecePrefix(I18N::translate('Name prefix')),
                'INDI:NAME:GIVN'           => new NamePieceGiven(I18N::translate('Given names')),
                'INDI:NAME:NICK'           => new NamePieceNickname(I18N::translate('Nickname')),
                'INDI:NAME:SPFX'           => new NamePieceSurnamePrefix(I18N::translate('Surname prefix')),
                'INDI:NAME:SURN'           => new NamePieceSurname(I18N::translate('Surname')),
                'INDI:NAME:NSFX'           => new NamePieceSuffix(I18N::translate('Name suffix')),
                'INDI:NAME:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'INDI:NAME:FONE'           => new NamePhoneticVariation(I18N::translate('Phonetic name')),
                'INDI:NAME:FONE:TYPE'      => new PhoneticType(I18N::translate('Type of name')),
                'INDI:NAME:FONE:NPFX'      => new NamePiecePrefix(I18N::translate('Name prefix')),
                'INDI:NAME:FONE:GIVN'      => new NamePieceGiven(I18N::translate('Given names')),
                'INDI:NAME:FONE:NICK'      => new NamePieceNickname(I18N::translate('Nickname')),
                'INDI:NAME:FONE:SPFX'      => new NamePieceSurnamePrefix(I18N::translate('Surname prefix')),
                'INDI:NAME:FONE:SURN'      => new NamePieceSurname(I18N::translate('Surname')),
                'INDI:NAME:FONE:NSFX'      => new NamePieceSuffix(I18N::translate('Name suffix')),
                'INDI:NAME:ROMN'           => new NameRomanizedVariation(I18N::translate('Romanized name')),
                'INDI:NAME:ROMN:TYPE'      => new RomanizedType(I18N::translate('Type')),
                'INDI:NAME:ROMN:NPFX'      => new NamePiecePrefix(I18N::translate('Name prefix')),
                'INDI:NAME:ROMN:GIVN'      => new NamePieceGiven(I18N::translate('Given names')),
                'INDI:NAME:ROMN:NICK'      => new NamePieceNickname(I18N::translate('Nickname')),
                'INDI:NAME:ROMN:SPFX'      => new NamePieceSurnamePrefix(I18N::translate('Surname prefix')),
                'INDI:NAME:ROMN:SURN'      => new NamePieceSurname(I18N::translate('Surname')),
                'INDI:NAME:ROMN:NSFX'      => new NamePieceSuffix(I18N::translate('Name suffix')),
                'INDI:NATI'                => new NationOrTribalOrigin(I18N::translate('Nationality')),
                'INDI:NATU'                => new Naturalization(I18N::translate('Naturalization')),
                'INDI:NATU:DATE'           => new DateValue(I18N::translate('Date of naturalization')),
                'INDI:NATU:PLAC'           => new PlaceName(I18N::translate('Place of naturalization')),
                'INDI:NCHI'                => new CountOfChildren(I18N::translate('Number of children')),
                'INDI:NMR'                 => new CountOfMarriages(I18N::translate('Number of marriages')),
                'INDI:NOTE'                => new NoteStructure(I18N::translate('Note')),
                'INDI:OBJE'                => new XrefMedia(I18N::translate('Media object')),
                'INDI:OCCU'                => new Occupation(I18N::translate('Occupation')),
                'INDI:OCCU:AGNC'           => new ResponsibleAgency(I18N::translate('Employer')),
                'INDI:ORDN'                => new Ordination(I18N::translate('Ordination')),
                'INDI:ORDN:AGNC'           => new Ordination(I18N::translate('Religious institution')),
                'INDI:ORDN:DATE'           => new Ordination(I18N::translate('Date of ordination')),
                'INDI:ORDN:PLAC'           => new Ordination(I18N::translate('Place of ordination')),
                'INDI:PROB'                => new Probate(I18N::translate('Probate')),
                'INDI:PROP'                => new Possessions(I18N::translate('Property')),
                'INDI:REFN'                => new UserReferenceNumber(I18N::translate('Reference number')),
                'INDI:REFN:TYPE'           => new UserReferenceType(I18N::translate('Type')),
                'INDI:RELI'                => new ReligiousAffiliation(I18N::translate('Religion')),
                'INDI:RESI'                => new Residence(I18N::translate('Residence')),
                'INDI:RESI:DATE'           => new DateValue(I18N::translate('Date of residence')),
                'INDI:RESI:PLAC'           => new PlaceName(I18N::translate('Place of residence')),
                'INDI:RESN'                => new RestrictionNotice(I18N::translate('Restriction')),
                'INDI:RETI'                => new Retirement(I18N::translate('Retirement')),
                'INDI:RETI:AGNC'           => new ResponsibleAgency(I18N::translate('Employer')),
                'INDI:RFN'                 => new PermanentRecordFileNumber(I18N::translate('Record file number')),
                'INDI:RIN'                 => new AutomatedRecordId(I18N::translate('Record ID number')),
                'INDI:SEX'                 => new SexValue(I18N::translate('Gender')),
                'INDI:SLGC'                => new LdsChildSealing(I18N::translate('LDS child sealing')),
                'INDI:SLGC:DATE'           => new DateLdsOrd(I18N::translate('Date of LDS child sealing')),
                'INDI:SLGC:TEMP'           => new TempleCode(/* I18N: https://en.wikipedia.org/wiki/Temple_(LDS_Church)*/ I18N::translate('Temple')),
                'INDI:SLGC:PLAC'           => new PlaceLivingOrdinance(I18N::translate('Place of LDS child sealing')),
                'INDI:SLGC:FAMC'           => new XrefFamily(I18N::translate('Parents')),
                'INDI:SLGC:STAT'           => new LdsChildSealingDateStatus(I18N::translate('Status')),
                'INDI:SLGC:STAT:DATE'      => new ChangeDate(I18N::translate('Status change date')),
                'INDI:SLGC:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'INDI:SSN'                 => new SocialSecurityNumber(I18N::translate('Social security number')),
                'INDI:SUBM'                => new XrefSubmitter(I18N::translate('Submitter')),
                'INDI:SOUR'                => new XrefSource(I18N::translate('Source')),
                'INDI:SOUR:PAGE'           => new WhereWithinSource(I18N::translate('Citation details')),
                'INDI:SOUR:EVEN'           => new EventTypeCitedFrom(I18N::translate('Event')),
                'INDI:SOUR:EVEN:ROLE'      => new RoleInEvent(I18N::translate('Role')),
                'INDI:SOUR:DATA'           => new SourceData(I18N::translate('Data')),
                'INDI:SOUR:DATA:DATE'      => new EntryRecordingDate(I18N::translate('Date of entry in original source')),
                'INDI:SOUR:DATA:TEXT'      => new TextFromSource(I18N::translate('Text')),
                'INDI:SOUR:OBJE'           => new XrefMedia(I18N::translate('Media object')),
                'INDI:SOUR:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'INDI:SOUR:QUAY'           => new CertaintyAssessment(I18N::translate('Quality of data')),
                'INDI:TITL'                => new NobilityTypeTitle(I18N::translate('Title')),
                'INDI:WILL'                => new Will(I18N::translate('Will')),
                'INDI:_UID'                => new PafUid(I18N::translate('Unique identifier')), // ***
                'INDI:*:ADDR'              => new AddressLine(I18N::translate('Address')),
                'INDI:*:ADDR:ADR1'         => new AddressLine1(I18N::translate('Address line 1')),
                'INDI:*:ADDR:ADR2'         => new AddressLine2(I18N::translate('Address line 2')),
                'INDI:*:ADDR:ADR3'         => new AddressLine3(I18N::translate('Address line 3')),
                'INDI:*:ADDR:CITY'         => new AddressCity(I18N::translate('City')),
                'INDI:*:ADDR:STAE'         => new AddressState(I18N::translate('State')),
                'INDI:*:ADDR:POST'         => new AddressPostalCode(I18N::translate('Postal code')),
                'INDI:*:ADDR:CTRY'         => new AddressCountry(I18N::translate('Country')),
                'INDI:*:AGE'               => new AgeAtEvent(I18N::translate('Age')),
                'INDI:*:AGNC'              => new ResponsibleAgency(I18N::translate('Agency')),
                'INDI:*:ASSO'              => new XrefIndividual(I18N::translate('Associate')), // ***
                'INDI:*:ASSO:RELA'         => new RelationIsDescriptor(I18N::translate('Relationship')),
                'INDI:*:CAUS'              => new CauseOfEvent(I18N::translate('Cause')),
                'INDI:*:DATE'              => new DateValue(I18N::translate('Date')),
                'INDI:*:EMAIL'             => new AddressEmail(I18N::translate('Email address')),
                'INDI:*:FAX'               => new AddressFax(I18N::translate('Fax')),
                'INDI:*:NOTE'              => new NoteStructure(I18N::translate('Note')),
                'INDI:*:PHON'              => new PhoneNumber(I18N::translate('Phone')),
                'INDI:*:PLAC'              => new PlaceName(I18N::translate('Place')),
                'INDI:*:PLAC:FORM'         => new PlaceHierarchy(I18N::translate('Format')),
                'INDI:*:PLAC:FONE'         => new PlacePhoneticVariation(I18N::translate('Phonetic place')),
                'INDI:*:PLAC:FONE:TYPE'    => new PhoneticType(I18N::translate('Type')),
                'INDI:*:PLAC:ROMN'         => new PlaceRomanizedVariation(I18N::translate('Romanized place')),
                'INDI:*:PLAC:ROMN:TYPE'    => new RomanizedType(I18N::translate('Type')),
                'INDI:*:PLAC:MAP'          => new EmptyElement(I18N::translate('Coordinates')),
                'INDI:*:PLAC:MAP:LATI'     => new PlaceLatitude(I18N::translate('Latitude')),
                'INDI:*:PLAC:MAP:LONG'     => new PlaceLongtitude(I18N::translate('Longitude')),
                'INDI:*:PLAC:NOTE'         => new NoteStructure(I18N::translate('Note')),
                'INDI:*:PLAC:_HEB'         => new NoteStructure(I18N::translate('Place in Hebrew')), // ***
                'INDI:*:OBJE'              => new XrefMedia(I18N::translate('Media object')),
                'INDI:*:RELI'              => new ReligiousAffiliation(I18N::translate('Religion')),
                'INDI:*:RESN'              => new RestrictionNotice(I18N::translate('Restriction')),
                'INDI:*:SOUR'              => new XrefSource(I18N::translate('Source')),
                'INDI:*:SOUR:PAGE'         => new WhereWithinSource(I18N::translate('Citation details')),
                'INDI:*:SOUR:EVEN'         => new EventTypeCitedFrom(I18N::translate('Event')),
                'INDI:*:SOUR:EVEN:ROLE'    => new RoleInEvent(I18N::translate('Role')),
                'INDI:*:SOUR:DATA'         => new SourceData(I18N::translate('Data')),
                'INDI:*:SOUR:DATA:DATE'    => new EntryRecordingDate(I18N::translate('Date of entry in original source')),
                'INDI:*:SOUR:DATA:TEXT'    => new TextFromSource(I18N::translate('Text')),
                'INDI:*:SOUR:OBJE'         => new XrefMedia(I18N::translate('Media object')),
                'INDI:*:SOUR:NOTE'         => new NoteStructure(I18N::translate('Note')),
                'INDI:*:SOUR:QUAY'         => new CertaintyAssessment(I18N::translate('Quality of data')),
                'INDI:*:TYPE'              => new EventOrFactClassification(I18N::translate('Type')),
                'INDI:*:WWW'               => new AddressWebPage(I18N::translate('URL')),
                'INDI:*:_ASSO'             => new XrefIndividual(I18N::translate('Associate')), // ***
                'INDI:*:_ASSO:RELA'        => new RelationIsDescriptor(I18N::translate('Relationship')), // ***
                'INDI:_TODO'               => new UnknownElement(I18N::translate('Research task')), // *** webtrees
                'INDI:_TODO:DATE'          => new DateValue(I18N::translate('Date')), // *** webtrees
                'INDI:_TODO:_WT_USER'      => new WebtreesUser(I18N::translate('User')), // *** webtrees
                'INDI:_WT_OBJE_SORT'       => new XrefMedia(I18N::translate('Re-order media')), // *** webtrees 1.7

                'FAM'                     => new EmptyElement(I18N::translate('Family')),
                'FAM:ANUL'                => new Annulment(I18N::translate('Annulment')),
                'FAM:CENS'                => new Census(I18N::translate('Census')),
                'FAM:CHAN'                => new Change(I18N::translate('Last change')),
                'FAM:CHAN:DATE'           => new ChangeDate(I18N::translate('Date of last change')),
                'FAM:CHAN:DATE:TIME'      => new TimeValue(I18N::translate('Time')),
                'FAM:CHAN:_WT_USER'       => new WebtreesUser(I18N::translate('Author of last change')), // *** webtrees
                'FAM:CHIL'                => new XrefIndividual(I18N::translate('Child')),
                'FAM:DIV'                 => new Divorce(I18N::translate('Divorce')),
                'FAM:DIVF'                => new DivorceFiled(I18N::translate('Divorce filed')),
                'FAM:ENGA'                => new Engagement(I18N::translate('Engagement')),
                'FAM:ENGA:DATE'           => new DateValue(I18N::translate('Date of engagement')),
                'FAM:ENGA:PLACE'          => new PlaceName(I18N::translate('Place of engagement')),
                'FAM:EVEN'                => new EventDescriptor(I18N::translate('Event')),
                'FAM:EVEN:TYPE'           => new EventAttributeType(I18N::translate('Type of event')),
                'FAM:HUSB'                => new XrefIndividual(I18N::translate('Husband')),
                'FAM:MARB'                => new MarriageBanns(I18N::translate('Marriage banns')),
                'FAM:MARB:DATE'           => new DateValue(I18N::translate('Date of marriage banns')),
                'FAM:MARB:PLAC'           => new PlaceName(I18N::translate('Place of marriage banns')),
                'FAM:MARC'                => new MarriageContract(I18N::translate('Marriage contract')),
                'FAM:MARL'                => new MarriageLicence(I18N::translate('Marriage license')),
                'FAM:MARS'                => new MarriageSettlement(I18N::translate('Marriage settlement')),
                'FAM:MARR'                => new Marriage(I18N::translate('Marriage')),
                'FAM:MARR:DATE'           => new DateValue(I18N::translate('Date of marriage')),
                'FAM:MARR:PLAC'           => new PlaceName(I18N::translate('Place of marriage')),
                'FAM:MARR:TYPE'           => new MarriageType(I18N::translate('Type of marriage')),
                'FAM:NCHI'                => new CountOfChildren(I18N::translate('Number of children')),
                'FAM:NOTE'                => new NoteStructure(I18N::translate('Note')),
                'FAM:OBJE'                => new XrefMedia(I18N::translate('Media object')),
                'FAM:REFN'                => new UserReferenceNumber(I18N::translate('Reference number')),
                'FAM:REFN:TYPE'           => new UserReferenceType(I18N::translate('Type')),
                'FAM:RIN'                 => new AutomatedRecordId(I18N::translate('Record ID number')),
                'FAM:RESI'                => new Residence(I18N::translate('Residence')),
                'FAM:RESN'                => new RestrictionNotice(I18N::translate('Restriction')),
                'FAM:SUBM'                => new XrefSubmitter(I18N::translate('Submitter')),
                'FAM:SLGS'                => new LdsSpouseSealing(I18N::translate('LDS spouse sealing')),
                'FAM:SLGS:DATE'           => new DateLdsOrd(I18N::translate('Date')),
                'FAM:SLGS:TEMP'           => new TempleCode(/* I18N: https://en.wikipedia.org/wiki/Temple_(LDS_Church)*/ I18N::translate('Temple')),
                'FAM:SLGS:PLAC'           => new PlaceLivingOrdinance(I18N::translate('Place')),
                'FAM:SLGS:STAT'           => new LdsSpouseSealingDateStatus(I18N::translate('Status')),
                'FAM:SLGS:STAT:DATE'      => new ChangeDate(I18N::translate('Status change date')),
                'FAM:SLGS:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'FAM:SLGS:SOUR'           => new XrefSource(I18N::translate('Source')),
                'FAM:SLGS:SOUR:PAGE'      => new WhereWithinSource(I18N::translate('Citation details')),
                'FAM:SLGS:SOUR:EVEN'      => new EventTypeCitedFrom(I18N::translate('Event')),
                'FAM:SLGS:SOUR:EVEN:ROLE' => new RoleInEvent(I18N::translate('Role')),
                'FAM:SLGS:SOUR:DATA'      => new SourceData(I18N::translate('Data')),
                'FAM:SLGS:SOUR:DATA:DATE' => new EntryRecordingDate(I18N::translate('Date of entry in original source')),
                'FAM:SLGS:SOUR:DATA:TEXT' => new TextFromSource(I18N::translate('Text')),
                'FAM:SLGS:SOUR:OBJE'      => new XrefMedia(I18N::translate('Media object')),
                'FAM:SLGS:SOUR:NOTE'      => new NoteStructure(I18N::translate('Note')),
                'FAM:SLGS:SOUR:QUAY'      => new CertaintyAssessment(I18N::translate('Quality of data')),
                'FAM:SOUR'                => new XrefSource(I18N::translate('Source')),
                'FAM:SOUR:PAGE'           => new WhereWithinSource(I18N::translate('Citation details')),
                'FAM:SOUR:EVEN'           => new EventTypeCitedFrom(I18N::translate('Event')),
                'FAM:SOUR:EVEN:ROLE'      => new RoleInEvent(I18N::translate('Role')),
                'FAM:SOUR:DATA'           => new SourceData(I18N::translate('Data')),
                'FAM:SOUR:DATA:DATE'      => new EntryRecordingDate(I18N::translate('Date of entry in original source')),
                'FAM:SOUR:DATA:TEXT'      => new TextFromSource(I18N::translate('Text')),
                'FAM:SOUR:OBJE'           => new XrefMedia(I18N::translate('Media object')),
                'FAM:SOUR:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'FAM:SOUR:QUAY'           => new CertaintyAssessment(I18N::translate('Quality of data')),
                'FAM:WIFE'                => new XrefIndividual(I18N::translate('Wife')),
                'FAM:_UID'                => new PafUid(I18N::translate('Unique identifier')), // ***
                'FAM:*:ADDR'              => new AddressLine(I18N::translate('Address')),
                'FAM:*:ADDR:ADR1'         => new AddressLine1(I18N::translate('Address line 1')),
                'FAM:*:ADDR:ADR2'         => new AddressLine2(I18N::translate('Address line 2')),
                'FAM:*:ADDR:ADR3'         => new AddressLine3(I18N::translate('Address line 3')),
                'FAM:*:ADDR:CITY'         => new AddressCity(I18N::translate('City')),
                'FAM:*:ADDR:STAE'         => new AddressState(I18N::translate('State')),
                'FAM:*:ADDR:POST'         => new AddressPostalCode(I18N::translate('Postal code')),
                'FAM:*:ADDR:CTRY'         => new AddressCountry(I18N::translate('Country')),
                'FAM:*:AGNC'              => new ResponsibleAgency(I18N::translate('Agency')),
                'FAM:*:CAUS'              => new CauseOfEvent(I18N::translate('Cause')),
                'FAM:*:DATE'              => new DateValue(I18N::translate('Date')),
                'FAM:*:EMAIL'             => new AddressEmail(I18N::translate('Email address')),
                'FAM:*:FAX'               => new AddressFax(I18N::translate('Fax')),
                'FAM:*:HUSB'              => new EmptyElement(I18N::translate('Husband'), ['AGE' => '0:1']),
                'FAM:*:HUSB:AGE'          => new AgeAtEvent(I18N::translate('Husband’s age')),
                'FAM:*:NOTE'              => new NoteStructure(I18N::translate('Note')),
                'FAM:*:PHON'              => new PhoneNumber(I18N::translate('Phone')),
                'FAM:*:PLAC'              => new PlaceName(I18N::translate('Place')),
                'FAM:*:PLAC:FORM'         => new PlaceHierarchy(I18N::translate('Format')),
                'FAM:*:PLAC:FONE'         => new PlacePhoneticVariation(I18N::translate('Phonetic place')),
                'FAM:*:PLAC:FONE:TYPE'    => new PhoneticType(I18N::translate('Type')),
                'FAM:*:PLAC:ROMN'         => new PlaceRomanizedVariation(I18N::translate('Romanized place')),
                'FAM:*:PLAC:ROMN:TYPE'    => new RomanizedType(I18N::translate('Type')),
                'FAM:*:PLAC:MAP'          => new EmptyElement(I18N::translate('Coordinates')),
                'FAM:*:PLAC:MAP:LATI'     => new PlaceLatitude(I18N::translate('Latitude')),
                'FAM:*:PLAC:MAP:LONG'     => new PlaceLongtitude(I18N::translate('Longitude')),
                'FAM:*:PLAC:NOTE'         => new NoteStructure(I18N::translate('Note')),
                'FAM:*:OBJE'              => new XrefMedia(I18N::translate('Media object')),
                'FAM:*:RELI'              => new ReligiousAffiliation(I18N::translate('Religion')),
                'FAM:*:RESN'              => new RestrictionNotice(I18N::translate('Restriction')),
                'FAM:*:SOUR'              => new XrefSource(I18N::translate('Source')),
                'FAM:*:SOUR:PAGE'         => new WhereWithinSource(I18N::translate('Citation details')),
                'FAM:*:SOUR:EVEN'         => new EventTypeCitedFrom(I18N::translate('Event')),
                'FAM:*:SOUR:EVEN:ROLE'    => new RoleInEvent(I18N::translate('Role')),
                'FAM:*:SOUR:DATA'         => new SourceData(I18N::translate('Data')),
                'FAM:*:SOUR:DATA:DATE'    => new EntryRecordingDate(I18N::translate('Date of entry in original source')),
                'FAM:*:SOUR:DATA:TEXT'    => new TextFromSource(I18N::translate('Text')),
                'FAM:*:SOUR:OBJE'         => new XrefMedia(I18N::translate('Media object')),
                'FAM:*:SOUR:NOTE'         => new NoteStructure(I18N::translate('Note')),
                'FAM:*:SOUR:QUAY'         => new CertaintyAssessment(I18N::translate('Quality of data')),
                'FAM:*:TYPE'              => new EventOrFactClassification(I18N::translate('Type')),
                'FAM:*:WIFE'              => new EmptyElement(I18N::translate('Wife'), ['AGE' => '0:1']),
                'FAM:*:WIFE:AGE'          => new AgeAtEvent(I18N::translate('Wife’s age')),
                'FAM:*:WWW'               => new AddressWebPage(I18N::translate('URL')),
                'FAM:*:_ASSO'             => new XrefIndividual(I18N::translate('Associate')), // ***
                'FAM:*:_ASSO:RELA'        => new RelationIsDescriptor(I18N::translate('Relationship')), // ***

                'NOTE'                => new NoteRecord(I18N::translate('Note')),
                'NOTE:CONC'           => new SubmitterText(I18N::translate('Note')),
                'NOTE:CONT'           => new SubmitterText(I18N::translate('Continued')),
                'NOTE:REFN'           => new UserReferenceNumber(I18N::translate('Reference number')),
                'NOTE:REFN:TYPE'      => new UserReferenceType(I18N::translate('Type')),
                'NOTE:RIN'            => new AutomatedRecordId(I18N::translate('Record ID number')),
                'NOTE:SOUR'           => new XrefSource(I18N::translate('Source')),
                'NOTE:SOUR:PAGE'      => new WhereWithinSource(I18N::translate('Citation details')),
                'NOTE:SOUR:EVEN'      => new EventTypeCitedFrom(I18N::translate('Event')),
                'NOTE:SOUR:EVEN:ROLE' => new RoleInEvent(I18N::translate('Role')),
                'NOTE:SOUR:DATA'      => new SourceData(I18N::translate('Data')),
                'NOTE:SOUR:DATA:DATE' => new EntryRecordingDate(I18N::translate('Date of entry in original source')),
                'NOTE:SOUR:DATA:TEXT' => new TextFromSource(I18N::translate('Text')),
                'NOTE:SOUR:OBJE'      => new XrefMedia(I18N::translate('Media object')),
                'NOTE:SOUR:NOTE'      => new NoteStructure(I18N::translate('Note')),
                'NOTE:SOUR:QUAY'      => new CertaintyAssessment(I18N::translate('Quality of data')),
                'NOTE:CHAN'           => new Change(I18N::translate('Last change')),
                'NOTE:CHAN:DATE'      => new ChangeDate(I18N::translate('Date of last change')),
                'NOTE:CHAN:DATE:TIME' => new TimeValue(I18N::translate('Time')),
                'NOTE:CHAN:_WT_USER'  => new WebtreesUser(I18N::translate('Author of last change')), // *** webtrees
                'NOTE:CHAN:NOTE'      => new NoteStructure(I18N::translate('Note')),
                'NOTE:_UID'           => new PafUid(I18N::translate('Unique identifier')), // ***

                'OBJE'                => new EmptyElement(I18N::translate('Media object')),
                'OBJE:FILE'           => new MultimediaFileReference(I18N::translate('Filename')),
                'OBJE:FILE:FORM'      => new MultimediaFormat(I18N::translate('Format')),
                'OBJE:FILE:FORM:TYPE' => new SourceMediaType(I18N::translate('Media type')),
                'OBJE:FILE:TITL'      => new DescriptiveTitle(I18N::translate('Title')),
                'OBJE:REFN'           => new UserReferenceNumber(I18N::translate('Reference number')),
                'OBJE:REFN:TYPE'      => new UserReferenceType(I18N::translate('Type')),
                'OBJE:RIN'            => new AutomatedRecordId(I18N::translate('Record ID number')),
                'OBJE:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'OBJE:SOUR'           => new XrefSource(I18N::translate('Source')),
                'OBJE:SOUR:PAGE'      => new WhereWithinSource(I18N::translate('Citation details')),
                'OBJE:SOUR:EVEN'      => new EventTypeCitedFrom(I18N::translate('Event')),
                'OBJE:SOUR:EVEN:ROLE' => new RoleInEvent(I18N::translate('Role')),
                'OBJE:SOUR:DATA'      => new SourceData(I18N::translate('Data')),
                'OBJE:SOUR:DATA:DATE' => new EntryRecordingDate(I18N::translate('Date of entry in original source')),
                'OBJE:SOUR:DATA:TEXT' => new TextFromSource(I18N::translate('Text')),
                'OBJE:SOUR:OBJE'      => new XrefMedia(I18N::translate('Media object')),
                'OBJE:SOUR:NOTE'      => new NoteStructure(I18N::translate('Note')),
                'OBJE:SOUR:QUAY'      => new CertaintyAssessment(I18N::translate('Quality of data')),
                'OBJE:CHAN'           => new Change(I18N::translate('Last change')),
                'OBJE:CHAN:DATE'      => new ChangeDate(I18N::translate('Date of last change')),
                'OBJE:CHAN:DATE:TIME' => new TimeValue(I18N::translate('Time')),
                'OBJE:CHAN:_WT_USER'  => new WebtreesUser(I18N::translate('Author of last change')), // *** webtrees
                'OBJE:CHAN:NOTE'      => new NoteStructure(I18N::translate('Note')),
                'OBJE:_UID'           => new PafUid(I18N::translate('Unique identifier')), // ***

                'REPO'                => new RepositoryRecord(I18N::translate('Repository')),
                'REPO:NAME'           => new NameOfRepository(I18N::translateContext('Repository', 'Name')),
                'REPO:ADDR'           => new AddressLine(I18N::translate('Address')),
                'REPO:ADDR:ADR1'      => new AddressLine1(I18N::translate('Address line 1')),
                'REPO:ADDR:ADR2'      => new AddressLine2(I18N::translate('Address line 2')),
                'REPO:ADDR:ADR3'      => new AddressLine3(I18N::translate('Address line 3')),
                'REPO:ADDR:CITY'      => new AddressCity(I18N::translate('City')),
                'REPO:ADDR:STAE'      => new AddressState(I18N::translate('State')),
                'REPO:ADDR:POST'      => new AddressPostalCode(I18N::translate('Postal code')),
                'REPO:ADDR:CTRY'      => new AddressCountry(I18N::translate('Country')),
                'REPO:PHON'           => new PhoneNumber(I18N::translate('Phone')),
                'REPO:EMAIL'          => new AddressEmail(I18N::translate('Email address')),
                'REPO:FAX'            => new AddressFax(I18N::translate('Fax')),
                'REPO:WWW'            => new AddressWebPage(I18N::translate('URL')),
                'REPO:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'REPO:REFN'           => new UserReferenceNumber(I18N::translate('Reference number')),
                'REPO:REFN:TYPE'      => new UserReferenceType(I18N::translate('Type')),
                'REPO:RIN'            => new AutomatedRecordId(I18N::translate('Record ID number')),
                'REPO:CHAN'           => new Change(I18N::translate('Last change')),
                'REPO:CHAN:DATE'      => new ChangeDate(I18N::translate('Date of last change')),
                'REPO:CHAN:DATE:TIME' => new TimeValue(I18N::translate('Time')),
                'REPO:CHAN:_WT_USER'  => new WebtreesUser(I18N::translate('Author of last change')), // *** webtrees
                'REPO:CHAN:NOTE'      => new NoteStructure(I18N::translate('Note')),
                'REPO:_UID'           => new PafUid(I18N::translate('Unique identifier')), // ***

                'SOUR'                => new SourceRecord(I18N::translate('Source')),
                'SOUR:DATA'           => new EmptyElement(I18N::translate('Data'), ['EVEN' => '0:M', 'AGNC' => '0:1', 'NOTE' => '0:M']),
                'SOUR:DATA:EVEN'      => new EventsRecorded(I18N::translate('Events')),
                'SOUR:DATA:EVEN:DATE' => new DateValue(I18N::translate('Date range')),
                'SOUR:DATA:EVEN:PLAC' => new SourceJurisdictionPlace(I18N::translate('Place')),
                'SOUR:DATA:AGNC'      => new ResponsibleAgency(I18N::translate('Agency')),
                'SOUR:DATA:NOTE'      => new NoteStructure(I18N::translate('Note')),
                'SOUR:AUTH'           => new SourceOriginator(I18N::translate('Author')),
                'SOUR:TITL'           => new DescriptiveTitle(I18N::translate('Title')),
                'SOUR:ABBR'           => new SourceFiledByEntry(I18N::translate('Abbreviation')),
                'SOUR:PUBL'           => new SourcePublicationFacts(I18N::translate('Publication')),
                'SOUR:TEXT'           => new TextFromSource(I18N::translate('Text')),
                'SOUR:REPO'           => new XrefRepository(I18N::translate('Repository')),
                'SOUR:REPO:NOTE'      => new NoteStructure(I18N::translate('Note')),
                'SOUR:REPO:CALN'      => new SourceCallNumber(I18N::translate('Call number')),
                'SOUR:REPO:CALN:MEDI' => new SourceMediaType(I18N::translate('Media type')),
                'SOUR:REFN'           => new UserReferenceNumber(I18N::translate('Reference number')),
                'SOUR:REFN:TYPE'      => new UserReferenceType(I18N::translate('Type')),
                'SOUR:RIN'            => new AutomatedRecordId(I18N::translate('Record ID number')),
                'SOUR:CHAN'           => new Change(I18N::translate('Last change')),
                'SOUR:CHAN:DATE'      => new ChangeDate(I18N::translate('Date of last change')),
                'SOUR:CHAN:DATE:TIME' => new TimeValue(I18N::translate('Time')),
                'SOUR:CHAN:_WT_USER'  => new WebtreesUser(I18N::translate('Author of last change')), // *** webtrees
                'SOUR:CHAN:NOTE'      => new NoteStructure(I18N::translate('Note')),
                'SOUR:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'SOUR:OBJE'           => new XrefMedia(I18N::translate('Media object')),
                'SOUR:_UID'           => new PafUid(I18N::translate('Unique identifier')), // ***

                'SUBM'                => new SubmitterRecord(I18N::translate('Submitter')),
                'SUBM:LANG'           => new LanguageId(I18N::translate('Language')),
                'SUBM:NAME'           => new SubmitterName(I18N::translate('Name')),
                'SUBM:ADDR'           => new AddressLine(I18N::translate('Address')),
                'SUBM:ADDR:ADR1'      => new AddressLine1(I18N::translate('Address line 1')),
                'SUBM:ADDR:ADR2'      => new AddressLine2(I18N::translate('Address line 2')),
                'SUBM:ADDR:ADR3'      => new AddressLine3(I18N::translate('Address line 3')),
                'SUBM:ADDR:CITY'      => new AddressCity(I18N::translate('City')),
                'SUBM:ADDR:STAE'      => new AddressState(I18N::translate('State')),
                'SUBM:ADDR:POST'      => new AddressPostalCode(I18N::translate('Postal code')),
                'SUBM:ADDR:CTRY'      => new AddressCountry(I18N::translate('Country')),
                'SUBM:PHON'           => new PhoneNumber(I18N::translate('Phone')),
                'SUBM:EMAIL'          => new AddressEmail(I18N::translate('Email address')),
                'SUBM:FAX'            => new AddressFax(I18N::translate('Fax')),
                'SUBM:WWW'            => new AddressWebPage(I18N::translate('URL')),
                'SUBM:OBJE'           => new XrefMedia(I18N::translate('Media object')),
                'SUBM:RFN'            => new SubmitterRegisteredRfn(I18N::translate('Record file number')),
                'SUBM:RIN'            => new AutomatedRecordId(I18N::translate('Record ID number')),
                'SUBM:NOTE'           => new NoteStructure(I18N::translate('Note')),
                'SUBM:CHAN'           => new Change(I18N::translate('Last change')),
                'SUBM:CHAN:DATE'      => new ChangeDate(I18N::translate('Date of last change')),
                'SUBM:CHAN:DATE:TIME' => new TimeValue(I18N::translate('Time')),
                'SUBM:CHAN:_WT_USER'  => new WebtreesUser(I18N::translate('Author of last change')), // *** webtrees
                'SUBM:CHAN:NOTE'      => new NoteStructure(I18N::translate('Note')),
                'SUBM:_UID'           => new PafUid(I18N::translate('Unique identifier')), // ***

                'SUBN'      => new EmptyElement(I18N::translate('Submission')),
                'SUBN:SUBM' => new XrefSubmitter(I18N::translate('Submitter')),
                'SUBN:FAMF' => new NameOfFamilyFile(I18N::translate('Family file')),
                'SUBN:TEMP' => new TempleCode(/* I18N: https://en.wikipedia.org/wiki/Temple_(LDS_Church)*/ I18N::translate('Temple')),
                'SUBN:ANCE' => new GenerationsOfAncestors(I18N::translate('Generations of ancestors')),
                'SUBN:DESC' => new GenerationsOfDescendants(I18N::translate('Generations of descendants')),
                'SUBN:ORDI' => new OrdinanceProcessFlag(I18N::translate('Ordinance')),
                'SUBN:RIN'  => new AutomatedRecordId(I18N::translate('Record ID number')),
                'SUBN:NOTE' => new NoteStructure(I18N::translate('Note')),
                'SUBN:_UID' => new PafUid(I18N::translate('Unique identifier')), // ***

                'HEAD'                         => new EmptyElement(I18N::translate('Header')),
                'HEAD:SOUR'                    => new ApprovedSystemId('Genealogy software'),
                'HEAD:SOUR:VERS'               => new VersionNumber(I18N::translate('Version')),
                'HEAD:SOUR:NAME'               => new NameOfProduct('Software product'),
                'HEAD:SOUR:CORP'               => new NameOfBusiness(I18N::translate('Corporation')),
                'HEAD:SOUR:CORP:ADDR'          => new AddressLine(I18N::translate('Address')),
                'HEAD:SOUR:CORP:ADDR:ADR1'     => new AddressLine1(I18N::translate('Address line 1')),
                'HEAD:SOUR:CORP:ADDR:ADR2'     => new AddressLine2(I18N::translate('Address line 2')),
                'HEAD:SOUR:CORP:ADDR:ADR3'     => new AddressLine3(I18N::translate('Address line 3')),
                'HEAD:SOUR:CORP:ADDR:CITY'     => new AddressCity(I18N::translate('City')),
                'HEAD:SOUR:CORP:ADDR:STAE'     => new AddressState(I18N::translate('State')),
                'HEAD:SOUR:CORP:ADDR:POST'     => new AddressPostalCode(I18N::translate('Postal code')),
                'HEAD:SOUR:CORP:ADDR:CTRY'     => new AddressCountry(I18N::translate('Country')),
                'HEAD:SOUR:CORP:PHON'          => new PhoneNumber(I18N::translate('Phone')),
                'HEAD:SOUR:CORP:EMAIL'         => new AddressEmail(I18N::translate('Email address')),
                'HEAD:SOUR:CORP:FAX'           => new AddressFax(I18N::translate('Fax')),
                'HEAD:SOUR:CORP:WWW'           => new AddressWebPage(I18N::translate('URL')),
                'HEAD:SOUR:DATA'               => new NameOfSourceData('Data'),
                'HEAD:SOUR:DATA:DATE'          => new PublicationDate(I18N::translate('Date')),
                'HEAD:SOUR:DATA:COPR'          => new CopyrightSourceData(I18N::translate('Copyright')),
                'HEAD:DEST'                    => new ReceivingSystemName(I18N::translate('Destination')),
                'HEAD:DATE'                    => new TransmissionDate(I18N::translate('Date')),
                'HEAD:DATE:TIME'               => new TimeValue(I18N::translate('Time')),
                'HEAD:SUBM'                    => new XrefSubmitter(I18N::translate('Submitter')),
                'HEAD:SUBN'                    => new XrefSubmission(I18N::translate('Submission')),
                'HEAD:FILE'                    => new FileName(I18N::translate('Filename')),
                'HEAD:COPR'                    => new CopyrightFile(I18N::translate('Copyright')),
                'HEAD:GEDC'                    => new Gedcom(I18N::translate('GEDCOM file')),
                'HEAD:GEDC:VERS'               => new VersionNumber(I18N::translate('Version')),
                'HEAD:GEDC:FORM'               => new Form(I18N::translate('Format')),
                'HEAD:CHAR'                    => new CharacterSet(I18N::translate('Character set')),
                'HEAD:CHAR:VERS'               => new VersionNumber(I18N::translate('Version')),
                'HEAD:PLAC'                    => new EmptyElement(I18N::translate('Place')),
                'HEAD:PLAC:FORM'               => new PlaceHierarchy(I18N::translate('Format')),
                'HEAD:NOTE'                    => new ContentDescription(I18N::translate('Note')),

                'TRLR' => new EmptyElement(I18N::translate('Trailer')), // Not used in webtrees
            ];
        }

        return $this->elements;
    }
}
