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

namespace Fisharebest\Webtrees\Statistics\Repository;

use Fisharebest\Webtrees\Carbon;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Statistics\Repository\Interfaces\BrowserRepositoryInterface;

/**
 * A repository providing methods for browser related statistics.
 */
class BrowserRepository implements BrowserRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function browserDate(): string
    {
        $format = strtr(I18N::dateFormat(), ['%' => '']);

        return Carbon::now()->local()->format($format);
    }

    /**
     * @inheritDoc
     */
    public function browserTime(): string
    {
        $format = strtr(I18N::timeFormat(), ['%' => '']);

        return Carbon::now()->local()->format($format);
    }

    /**
     * @inheritDoc
     */
    public function browserTimezone(): string
    {
        return Carbon::now()->local()->format('T');
    }
}
