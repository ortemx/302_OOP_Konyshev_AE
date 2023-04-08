<?php

namespace App\Tests;

use App\Truncater;
use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    public function testTruncate()
    {
        $defaultTruncater = new Truncater();
        $this->assertSame("Конышев Артем Евгеньевич", $defaultTruncater->truncate("Конышев Артем Евгеньевич"));
        $this->assertSame("Конышев Ар...", $defaultTruncater->truncate("Конышев Артем Евгеньевич", ['length' => 10]));
        $this->assertSame("Конышев Артем ...", $defaultTruncater->truncate("Конышев Артем Евгеньевич", ['length' => -10]));
        $this->assertSame("Конышев Ар*", $defaultTruncater->truncate("Конышев Артем Евгеньевич", ['length' => 10, 'separator' => '*']));
        $this->assertSame("Конышев Артем Евгеньевич", $defaultTruncater->truncate("Конышев Артем Евгеньевич"));

        $overriddenTruncater1 = new Truncater(['length' => 14]);
        $this->assertSame("Конышев Артем ...", $overriddenTruncater1->truncate("Конышев Артем Евгеньевич"));
        $this->assertSame("Конышев Артем \\", $overriddenTruncater1->truncate("Конышев Артем Евгеньевич", ['separator' => '\\']));

        $overriddenTruncater2 = new Truncater(['length' => 14, 'separator' => '***']);
        $this->assertSame("Конышев Артем ***", $overriddenTruncater2->truncate("Конышев Артем Евгеньевич"));
    }
}
