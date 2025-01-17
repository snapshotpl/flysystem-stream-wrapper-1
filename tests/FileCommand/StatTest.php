<?php
/*
 * This file is part of the flysystem-stream-wrapper package.
 *
 * (c) 2021-2021 m2m server software gmbh <tech@m2m.at>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M2MTech\FlysystemStreamWrapper\Tests\FileCommand;

class StatTest extends AbstractStatTest
{
    public function test(): void
    {
        $file = $this->testDir->createFile(true);
        $this->assertEquals($this->expectedStats($file->local, 0644), stat($file->flysystem));

        $dir = $this->testDir;
        $stats = stat($dir->flysystem);
        if (!$stats) {
            $this->fail();
        }

        $expected = $this->expectedStats($dir->local, 0755);
        $expected[7] = $expected['size'] = $stats['size'];
        $this->assertEquals($expected, $stats);
    }

    public function testNonExistingFIle(): void
    {
        $file = $this->testDir->createFile();
        $this->assertFalse(@stat($file->flysystem));

        $this->expectError();
        $this->expectErrorMessage('stat failed for');
        /** @noinspection PhpUnusedLocalVariableInspection */
        $stat = stat($file->flysystem);
    }
}
