<?php
/*
 * This file is part of the flysystem-stream-wrapper package.
 *
 * (c) 2021-2021 m2m server software gmbh <tech@m2m.at>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M2MTech\FlysystemStreamWrapper\Tests\FileCommand;

trait DataProvider
{
    /** @return array<array<bool>> */
    public function trueFalseProvider(): array
    {
        return [[true], [false]];
    }

    /** @return array<array<string>> */
    public function readOnlyModeProvider(): array
    {
        return [['r'], ['rb']];
    }

    /** @return array<array<string>> */
    public function writeOnlyModeProvider(): array
    {
        return [['w'], ['a'], ['c']];
    }

    /** @return array<array<string>> */
    public function exclusiveWriteOnlyModeProvider(): array
    {
        return [['x']];
    }

    /** @return array<array<string>> */
    public function readWriteModeProvider(): array
    {
        return [['r+'], ['w+'], ['a+'], ['c+']];
    }

    /** @return array<array<string>> */
    public function exclusiveReadWriteModeProvider(): array
    {
        return [['x+']];
    }
}
