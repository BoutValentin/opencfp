<?php

declare(strict_types=1);

/**
 * Copyright (c) 2013-2017 OpenCFP
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/opencfp/opencfp
 */

namespace OpenCFP\Http\Controller\Reviewer;

use Illuminate\Support\Collection;
use OpenCFP\Domain\Model\Favorite;
use OpenCFP\Domain\Model\Talk;
use OpenCFP\Domain\Model\User;
use OpenCFP\Domain\Services\Authentication;
use OpenCFP\Domain\Talk\TalkFormatter;
use OpenCFP\Http\Controller\BaseController;

class DashboardController extends BaseController
{
    public function indexAction()
    {
        /** @var Authentication $authentication */
        $authentication = $this->service(Authentication::class);

        $userId = $authentication->userId();

        $talkFormatter = new TalkFormatter();

        /** @var Collection $recentTalks */
        $recentTalks = Talk::recent()->get();
        $recentTalks = $talkFormatter->formatList($recentTalks, $userId);

        $templateData = [
            'speakerTotal'  => User::count(),
            'talkTotal'     => Talk::count(),
            'favoriteTotal' => Favorite::count(),
            'selectTotal'   => Talk::where('selected', 1)->count(),
            'talks'         => $recentTalks,
        ];

        return $this->render('reviewer/index.twig', $templateData);
    }
}
