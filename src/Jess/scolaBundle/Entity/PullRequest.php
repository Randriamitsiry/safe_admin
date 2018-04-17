<?php
/**
 * Created by PhpStorm.
 * User: gabriel
 * Date: 3/21/18
 * Time: 2:49 PM.
 */

namespace Jess\scolaBundle\Entity;

class PullRequest
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string
     */
    private $state;

    /**
     * PullRequest constructor.
     */
    public function __construct()
    {
        $this->state = 'travis';
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return PullRequest
     */
    public function setTitle(string $title): PullRequest
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return PullRequest
     */
    public function setDescription(string $description): PullRequest
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $marking
     *
     * @return PullRequest
     */
    public function setState(string $state): PullRequest
    {
        $this->state2 = $state;

        return $this;
    }
}
