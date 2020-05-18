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

use Fisharebest\Webtrees\GedcomElements\AddressWebPage;
use Fisharebest\Webtrees\GedcomElements\CustomElement;
use Fisharebest\Webtrees\GedcomElements\CustomEvent;
use Fisharebest\Webtrees\GedcomElements\GedcomElementInterface;
use Fisharebest\Webtrees\GedcomElements\RestrictionNotice;
use Fisharebest\Webtrees\GedcomElements\WebtreesUser;
use Fisharebest\Webtrees\GedcomElements\XrefMedia;
use Fisharebest\Webtrees\I18N;

/**
 * Class CustomTagsPhpGedView
 */
class CustomTagsPhpGedView extends AbstractModule implements ModuleConfigInterface, ModuleCustomTagsInterface
{
    use ModuleConfigTrait;
    use ModuleCustomTagsTrait;

    /**
     * @return array<string,GedcomElementInterface>
     */
    public function customTags(): array
    {
        return [
            'FAM:CHAN:_PGVU' => new WebtreesUser(I18N::translate('Author of last change')),
            'FAM:COMM'            => new CustomElement(I18N::translate('Comment')),

            'INDI:CHAN:_PGVU' => new WebtreesUser(I18N::translate('Author of last change')),
            'INDI:COMM'            => new CustomElement(I18N::translate('Comment')),
            'INDI:NAME:_HEB'  => new CustomElement(I18N::translate('Name in Hebrew')),
            'INDI:_PGV_OBJS'  => new XrefMedia(I18N::translate('Re-order media')),
            'INDI:_HOL'       => new CustomEvent(I18N::translate('Holocaust')),

            'NOTE:CHAN:_PGVU' => new WebtreesUser(I18N::translate('Author of last change')),

            'OBJE:CHAN:_PGVU' => new WebtreesUser(I18N::translate('Author of last change')),
            'OBJE:_PRIM'      => new CustomElement(I18N::translate('Highlighted image')),
            'OBJE:_THUM'      => new CustomElement(I18N::translate('Thumbnail image')),

            'REPO:CHAN:_PGVU' => new WebtreesUser(I18N::translate('Author of last change')),

            'SOUR:CHAN:_PGVU'       => new WebtreesUser(I18N::translate('Author of last change')),
            'SOUR:URL'              => new AddressWebPage(I18N::translate('URL')),
            'SOUR:URL:_BLOCK'       => new CustomElement(I18N::translate('Block')), // "e.g. "false"
            'SOUR:URL:TYPE'         => new CustomElement(I18N::translate('Type')), // e.g. "FamilySearch"
            'SOUR:SERV'             => new CustomElement(I18N::translate('Remote server')),
            'SOUR:_DBID'            => new CustomElement(I18N::translate('Database name')),
            'SOUR:_DBID:_USER'      => new CustomElement(I18N::translate('Database user account')),
            'SOUR:_DBID:_PASS'      => new CustomElement(I18N::translate('Database password')),
            'SOUR:_DBID:_PASS:RESN' => new RestrictionNotice(I18N::translate('Restriction')),
        ];
    }

    /**
     * The application for which we are supporting custom tags.
     *
     * @return string
     */
    public function customTagApplication(): string
    {
        return 'PhpGedView™';
    }
}
