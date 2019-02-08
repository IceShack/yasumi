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

namespace Yasumi\Provider\Switzerland;

use DateTime;
use DateTimeZone;
use Yasumi\Holiday;
use Yasumi\Provider\ChristianHolidays;
use Yasumi\Provider\Switzerland;

/**
 * Provider for all holidays in Obwalden (Switzerland).
 *
 * @link https://en.wikipedia.org/wiki/Obwalden
 */
class Obwalden extends Switzerland
{
    use ChristianHolidays;

    /**
     * Code to identify this Holiday Provider. Typically this is the ISO3166 code corresponding to the respective
     * country or sub-region.
     */
    public const ID = 'CH-OW';

    /**
     * Initialize holidays for Obwalden (Switzerland).
     *
     * @throws \Yasumi\Exception\InvalidDateException
     * @throws \InvalidArgumentException
     * @throws \Yasumi\Exception\UnknownLocaleException
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->addHoliday($this->goodFriday($this->year, $this->getTimezone(), $this->locale, Holiday::TYPE_OTHER));
        $this->addHoliday($this->corpusChristi($this->year, $this->getTimezone(), $this->locale));
        $this->addHoliday($this->assumptionOfMary($this->year, $this->getTimezone(), $this->locale, Holiday::TYPE_OTHER));
        $this->addHoliday($this->allSaintsDay($this->year, $this->getTimezone(), $this->locale, Holiday::TYPE_OTHER));
        $this->addHoliday($this->immaculateConception(
            $this->year,
            $this->getTimezone(),
            $this->locale,
            Holiday::TYPE_OTHER
        ));
        $this->addHoliday($this->stStephensDay($this->year, $this->getTimezone(), $this->locale, Holiday::TYPE_OTHER));
        $this->addHoliday($this->newYearsDay($this->year, $this->getTimezone(), $this->locale, Holiday::TYPE_OTHER));
        $this->addHoliday($this->christmasDay($this->year, $this->getTimezone(), $this->locale, Holiday::TYPE_OTHER));
        $this->addHoliday($this->ascensionDay($this->year, $this->getTimezone(), $this->locale, Holiday::TYPE_OTHER));
        $this->addHoliday($this->easterMonday($this->year, $this->getTimezone(), $this->locale, Holiday::TYPE_OTHER));
        $this->addHoliday($this->pentecostMonday($this->year, $this->getTimezone(), $this->locale, Holiday::TYPE_OTHER));

        $this->calculateBerchtoldsTag();
        $this->calculateBruderKlausenFest();
    }

    /**
     * Bruder-Klausen-Fest
     *
     * @link http://www.lebendigetraditionen.ch/traditionen/00210/index.html?lang=en
     *
     * @throws \Yasumi\Exception\InvalidDateException
     * @throws \InvalidArgumentException
     * @throws \Yasumi\Exception\UnknownLocaleException
     * @throws \Exception
     * @throws \Exception
     */
    public function calculateBruderKlausenFest(): void
    {
        if ($this->year >= 1947) {
            $this->addHoliday(new Holiday(
                'bruderKlausenFest',
                [
                    'de_DE' => 'Bruder-Klausen-Fest',
                    'de_CH' => 'Bruder-Klausen-Fest',
                ],
                new DateTime($this->year . '-09-25', new DateTimeZone($this->getTimezone())),
                $this->locale,
                Holiday::TYPE_OTHER
            ));
        } elseif ($this->year >= 1649) {
            $this->addHoliday(new Holiday(
                'bruderKlausenFest',
                [
                    'de_DE' => 'Bruder-Klausen-Fest',
                    'de_CH' => 'Bruder-Klausen-Fest',
                ],
                new DateTime($this->year . '-09-21', new DateTimeZone($this->getTimezone())),
                $this->locale,
                Holiday::TYPE_OTHER
            ));
        }
    }
}
