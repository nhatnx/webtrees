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

namespace Fisharebest\Webtrees;

use Fisharebest\Webtrees\GedcomElements\UnknownElement;
use Ramsey\Uuid\Uuid;

/**
 * Static GEDCOM data for tags
 *
 * @deprecated since 2.0.5.  Will be removed in 2.1.0 - Use Factory::elementFactory() instead
 */
class GedcomTag
{
    /** @var string[] Possible values for the Object-File-Format types */
    private const OBJE_FILE_FORM_TYPE = [
        'audio',
        'book',
        'card',
        'certificate',
        'coat',
        'document',
        'electronic',
        'fiche',
        'film',
        'magazine',
        'manuscript',
        'map',
        'newspaper',
        'photo',
        'tombstone',
        'video',
        'painting',
        'other',
    ];

    /**
     * Is $tag one of our known tags?
     *
     * @param string $tag
     *
     * @return bool
     */
    public static function isTag($tag): bool
    {
        return !Registry::elementFactory()->make($tag) instanceof UnknownElement;
    }

    /**
     * Translate a tag, for an (optional) record
     *
     * @param string $tag
     *
     * @return string
     */
    public static function getLabel($tag): string
    {
        return Registry::elementFactory()->make($tag)->label();
    }

    /**
     * Translate a label/value pair, such as “Occupation: Farmer”
     *
     * @param string            $tag
     * @param string            $value
     * @param GedcomRecord|null $record
     * @param string|null       $element
     *
     * @return string
     */
    public static function getLabelValue($tag, $value, GedcomRecord $record = null, $element = 'div'): string
    {
        return
            '<' . $element . ' class="fact_' . $tag . '">' .
            /* I18N: a label/value pair, such as “Occupation: Farmer”. Some languages may need to change the punctuation. */
            I18N::translate('<span class="label">%1$s:</span> <span class="field" dir="auto">%2$s</span>', self::getLabel($tag), $value) .
            '</' . $element . '>';
    }

    /**
     * Get a list of facts, for use in the "fact picker" edit control
     *
     * @param string $fact_type
     *
     * @return string[]
     */
    public static function getPicklistFacts($fact_type): array
    {
        switch ($fact_type) {
            case Individual::RECORD_TYPE:
                $tags = [
                    // Facts, attributes for individuals (no links to FAMs)
                    'RESN',
                    'NAME',
                    'SEX',
                    'BIRT',
                    'CHR',
                    'DEAT',
                    'BURI',
                    'CREM',
                    'ADOP',
                    'BAPM',
                    'BARM',
                    'BASM',
                    'BLES',
                    'CHRA',
                    'CONF',
                    'FCOM',
                    'ORDN',
                    'NATU',
                    'EMIG',
                    'IMMI',
                    'CENS',
                    'PROB',
                    'WILL',
                    'GRAD',
                    'RETI',
                    'EVEN',
                    'CAST',
                    'DSCR',
                    'EDUC',
                    'IDNO',
                    'NATI',
                    'NCHI',
                    'NMR',
                    'OCCU',
                    'PROP',
                    'RELI',
                    'RESI',
                    'SSN',
                    'TITL',
                    'FACT',
                    'BAPL',
                    'CONL',
                    'ENDL',
                    'SLGC',
                    'SUBM',
                    'ASSO',
                    'ALIA',
                    'ANCI',
                    'DESI',
                    'RFN',
                    'AFN',
                    'REFN',
                    'RIN',
                    'CHAN',
                    'NOTE',
                    'SHARED_NOTE',
                    'SOUR',
                    'OBJE',
                    // non standard tags
                    '_BRTM',
                    '_DEG',
                    '_DNA',
                    '_EYEC',
                    '_FNRL',
                    '_HAIR',
                    '_HEIG',
                    '_HNM',
                    '_HOL',
                    '_INTE',
                    '_MDCL',
                    '_MEDC',
                    '_MILI',
                    '_MILT',
                    '_NAME',
                    '_NAMS',
                    '_NLIV',
                    '_NMAR',
                    '_PRMN',
                    '_TODO',
                    '_UID',
                    '_WEIG',
                    '_YART',
                ];
                break;

            case Family::RECORD_TYPE:
                $tags = [
                    // Facts for families, left out HUSB, WIFE & CHIL links
                    'RESN',
                    'ANUL',
                    'CENS',
                    'DIV',
                    'DIVF',
                    'ENGA',
                    'MARB',
                    'MARC',
                    'MARR',
                    'MARL',
                    'MARS',
                    'RESI',
                    'EVEN',
                    'NCHI',
                    'SUBM',
                    'SLGS',
                    'REFN',
                    'RIN',
                    'CHAN',
                    'NOTE',
                    'SHARED_NOTE',
                    'SOUR',
                    'OBJE',
                    // non standard tags
                    '_NMR',
                    'MARR_CIVIL',
                    'MARR_RELIGIOUS',
                    'MARR_PARTNERS',
                    'MARR_UNKNOWN',
                    '_COML',
                    '_MBON',
                    '_MARI',
                    '_SEPR',
                    '_TODO',
                ];
                break;

            case Source::RECORD_TYPE:
                $tags = [
                    // Facts for sources
                    'DATA',
                    'AUTH',
                    'TITL',
                    'ABBR',
                    'PUBL',
                    'TEXT',
                    'REPO',
                    'REFN',
                    'RIN',
                    'CHAN',
                    'NOTE',
                    'SHARED_NOTE',
                    'OBJE',
                    'RESN',
                ];
                break;

            case Repository::RECORD_TYPE:
                $tags = [
                    // Facts for repositories
                    'NAME',
                    'ADDR',
                    'PHON',
                    'EMAIL',
                    'FAX',
                    'WWW',
                    'NOTE',
                    'SHARED_NOTE',
                    'REFN',
                    'RIN',
                    'CHAN',
                    'RESN',
                ];
                break;

            case 'PLAC':
                $tags = [
                    // Facts for places
                    'FONE',
                    'ROMN',
                    // non standard tags
                    '_GOV',
                    '_HEB',
                ];
                break;

            case 'NAME':
                $tags = [
                    // Facts subordinate to NAME
                    'FONE',
                    'ROMN',
                    // non standard tags
                    '_HEB',
                    '_AKA',
                    '_MARNM',
                ];
                break;

            default:
                $tags = [];
                break;
        }

        $facts = [];
        foreach ($tags as $tag) {
            $facts[$tag] = self::getLabel($tag);
        }
        uasort($facts, '\Fisharebest\Webtrees\I18N::strcasecmp');

        return $facts;
    }

    /**
     * Translate the value for 1 FILE/2 FORM/3 TYPE
     *
     * @param string $type
     *
     * @return string
     */
    public static function getFileFormTypeValue(string $type): string
    {
        switch (strtolower($type)) {
            case 'audio':
                /* I18N: Type of media object */
                return I18N::translate('Audio');
            case 'book':
                /* I18N: Type of media object */
                return I18N::translate('Book');
            case 'card':
                /* I18N: Type of media object */
                return I18N::translate('Card');
            case 'certificate':
                /* I18N: Type of media object */
                return I18N::translate('Certificate');
            case 'coat':
                /* I18N: Type of media object */
                return I18N::translate('Coat of arms');
            case 'document':
                /* I18N: Type of media object */
                return I18N::translate('Document');
            case 'electronic':
                /* I18N: Type of media object */
                return I18N::translate('Electronic');
            case 'fiche':
                /* I18N: Type of media object */
                return I18N::translate('Microfiche');
            case 'film':
                /* I18N: Type of media object */
                return I18N::translate('Microfilm');
            case 'magazine':
                /* I18N: Type of media object */
                return I18N::translate('Magazine');
            case 'manuscript':
                /* I18N: Type of media object */
                return I18N::translate('Manuscript');
            case 'map':
                /* I18N: Type of media object */
                return I18N::translate('Map');
            case 'newspaper':
                /* I18N: Type of media object */
                return I18N::translate('Newspaper');
            case 'photo':
                /* I18N: Type of media object */
                return I18N::translate('Photo');
            case 'tombstone':
                /* I18N: Type of media object */
                return I18N::translate('Tombstone');
            case 'video':
                /* I18N: Type of media object */
                return I18N::translate('Video');
            case 'painting':
                /* I18N: Type of media object */
                return I18N::translate('Painting');
            default:
                /* I18N: Type of media object */
                return I18N::translate('Other');
        }
    }

    /**
     * A list of all possible values for 1 FILE/2 FORM/3 TYPE
     *
     * @return string[]
     */
    public static function getFileFormTypes(): array
    {
        $values = array_map(static function (string $keyword): string {
            return self::getFileFormTypeValue($keyword);
        }, array_combine(self::OBJE_FILE_FORM_TYPE, self::OBJE_FILE_FORM_TYPE));

        uasort($values, '\Fisharebest\Webtrees\I18N::strcasecmp');

        return $values;
    }

    /**
     * Generate a value for a new _UID field.
     * Instead of RFC4122-compatible UUIDs, generate ones that
     * are compatible with PAF, Legacy, RootsMagic, etc.
     * In these, the string is upper-cased, dashes are removed,
     * and a two-byte checksum is added.
     *
     * @return string
     * @deprecated - Use PafUid
     */
    public static function createUid(): string
    {
        $uid = str_replace('-', '', Uuid::uuid4()->toString());

        $checksum_a = 0; // a sum of the bytes
        $checksum_b = 0; // a sum of the incremental values of $checksum_a

        // Compute checksums
        for ($i = 0; $i < 32; $i += 2) {
            $checksum_a += hexdec(substr($uid, $i, 2));
            $checksum_b += $checksum_a & 0xff;
        }

        return strtoupper($uid . substr(dechex($checksum_a), -2) . substr(dechex($checksum_b), -2));
    }
}
