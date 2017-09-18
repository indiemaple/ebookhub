<?php namespace Ebookhub\Core;

interface CreatorListener
{
    public function creatorFailed();
    public function creatorSucceed();
}