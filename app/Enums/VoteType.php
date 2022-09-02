<?php

namespace App\Enums;

enum VoteType: int
{
	case Downvote = 0;
	case Upvote = 1;
}