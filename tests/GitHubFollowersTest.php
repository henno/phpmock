<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class GitHubFollowersTest extends TestCase
{
    public $mockedHTTP;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->mockedHTTP = $this->createMock('HTTP');
        $this->mockedHTTP->method('get')->willReturn(json_decode(file_get_contents(__DIR__.'/octocatFollowers.json')));

    }

    public function testoctocatHasManyFollowers(): void
    {
        $this->assertGreaterThan(
            2,
            GitHub::getFollowerCount('octocat')
        );
    }

    public function testOthreeFollowsOctocat(): void
    {

        $this->assertTrue(
            Github::userFollowsUser('othree', 'octocat', $this->mockedHTTP)
        );
    }

    public function testJohnDoesNotFollowoctocat(): void
    {

        $this->assertNotTrue(
            Github::userFollowsUser('john', 'octocat', $this->mockedHTTP)
        );
    }

}

