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

namespace Fisharebest\Webtrees\GedcomElements;

/**
 * CHARACTER_SET := {Size=1:8}
 * [ ANSEL |UTF-8 | UNICODE | ASCII ]
 * A code value that represents the character set to be used to interpret this
 * data. Currently, the preferred character set is ANSEL, which includes ASCII
 * as a subset. UNICODE is not widely supported by most operating systems;
 * therefore, GEDCOM produced using the UNICODE character set will be limited
 * in its interchangeability for a while but should eventually provide the
 * international flexibility that is desired. See Chapter 3, starting on page
 * 77.
 * Note:The IBMPC character set is not allowed. This character set cannot be
 * interpreted properly without knowing which code page the sender was using.
 */
class CharacterSet extends AbstractElement
{
}
