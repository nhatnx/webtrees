<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2021 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace Fisharebest\Webtrees\Http\RequestHandlers;

use Fisharebest\Webtrees\Auth;
use Fisharebest\Webtrees\Http\ViewResponseTrait;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Registry;
use Fisharebest\Webtrees\Tree;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function assert;

/**
 * Add a new spouse to an individual, creating a new family.
 */
class AddSpouseToIndividualPage implements RequestHandlerInterface
{
    use ViewResponseTrait;

    /**
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $tree = $request->getAttribute('tree');
        assert($tree instanceof Tree);

        $xref = $request->getQueryParams()['xref'];

        $individual = Registry::individualFactory()->make($xref, $tree);
        $individual = Auth::checkIndividualAccess($individual, true);

        if ($individual->sex() === 'F') {
            $title  = $individual->fullName() . ' - ' . I18N::translate('Add a husband');
            $famtag = 'HUSB';
            $gender = 'M';
        } else {
            $title  = $individual->fullName() . ' - ' . I18N::translate('Add a wife');
            $famtag = 'WIFE';
            $gender = 'F';
        }

        return $this->viewResponse('edit/new-individual', [
            'next_action' => AddSpouseToIndividualAction::class,
            'tree'        => $tree,
            'title'       => $title,
            'individual'  => $individual,
            'family'      => null,
            'name_fact'   => null,
            'famtag'      => $famtag,
            'gender'      => $gender,
        ]);
    }
}
