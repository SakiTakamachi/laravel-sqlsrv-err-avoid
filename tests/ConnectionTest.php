<?php

namespace SqlsrvErrAvoid\Tests;

use Illuminate\Support\Facades\DB;

Class ConnectionTest extends TestCase
{
    public function test()
    {
        $expected = [];
        $actual = DB::connection('sqlsrv')->select('DO 1');

        $this->assertSame($expected, $actual);
    }
}
