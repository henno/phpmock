<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class GitHubFollowersTest extends TestCase
{
    public function testoctocatHasManyFollowers(): void
    {
        $this->assertGreaterThan(
            2,
            GitHub::getFollowerCount('octocat')
        );
    }

    public function testFredFollowsOctocat(): void
    {
        $this->assertTrue(
            Github::userFollowsUser('fred', 'octocat')
        );
    }

    public function testJohnDoesNotFollowoctocat(): void
    {
        $this->assertNotTrue(
            Github::userFollowsUser('john', 'octocat')
        );
    }

}

