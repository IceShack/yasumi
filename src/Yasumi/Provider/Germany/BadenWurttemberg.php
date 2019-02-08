<?php
/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2019 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me@sachatelgenhof.com>
 */

namespace Yasumi\Provider\Germany;

use Yasumi\Holiday;
use Yasumi\Provider\Germany;

/**
 * Provider for all holidays in Baden-Württemberg (Germany).
 *
 * Baden-Württemberg is a state in Germany located in the southwest, east of the Upper Rhine. It is Germany’s third
 * largest state in terms of size and population, with an area of 36,410 square kilometres (14,060 sq mi) and 10.7
 * million inhabitants. The state capital and largest city is Stuttgart.
 *
 * @link https://en.wikipedia.org/wiki/Baden-W%C3%BCrttemberg
 */
class BadenWurttemberg extends Germany
{
    /**
     * Code to identify this Holiday Provider. Typically this is the ISO3166 code corresponding to the respective
     * country or sub-region.
     */
    public const ID = 'DE-BW';

    /**
     * Initialize holidays for Baden-Württemberg (Germany).
     *
     * @throws \Yasumi\Exception\InvalidDateException
     * @throws \InvalidArgumentException
     * @throws \Yasumi\Exception\UnknownLocaleException
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        // Add custom Christian holidays
        $this->addHoliday($this->epiphany($this->year, $this->getTimezone(), $this->locale, Holiday::TYPE_OTHER));
        $this->addHoliday($this->corpusChristi($this->year, $this->getTimezone(), $this->locale));
        $this->addHoliday($this->allSaintsDay($this->year, $this->getTimezone(), $this->locale, Holiday::TYPE_OTHER));
    }
}
