<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2019 webtrees development team
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

namespace Fisharebest\Webtrees\Contracts;

use Fisharebest\Webtrees\GedcomElements\GedcomElementInterface;

/**
 * Make a GEDCOM primitive element.
 */
interface ElementFactoryInterface
{
    /**
     * Create a GEDCOM primitive object.
     *
     * @param string $tag
     *
     * @return GedcomElementInterface
     */
    public function make(string $tag): GedcomElementInterface;


    /**
     * Register more elements.
     *
     * @param array<string,GedcomElementInterface> $elements
     */
    public function register(array $elements): void;
}
