<?php

namespace App\Builders;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class QuestionBuilder extends Builder
{
	public function applyFilters(string $filter)
	{
		return $this->when($filter == 'latest', function ($query) {
				$query->latest();
			})
			->when($filter == 'popular-this-week', function ($query) {
				$query->popular()->whereBetween('created_at', [
					Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::FRIDAY)
				])->orderBy('id', 'desc');
			})
			->when($filter == 'popular-all-time', function ($query) {
				$query->popular()->orderBy('id', 'desc');
			})
			->when($filter == 'solved', function ($query) {
				$query->solved()->orderBy('id', 'desc');
			})
			->when($filter == 'unsolved', function ($query) {
				$query->unsolved()->orderBy('id', 'desc');
			})
			->when($filter == 'no-answers', function ($query) {
				$query->whereDoesntHave('answers')->orderBy('id', 'desc');
			});
	}

	public function popular()
	{
		return $this->orderBy('answers_count', 'desc');
	}

	public function solved()
	{
		return $this->whereHas('answers', function ($answers) {
			return $answers->where('accepted', true);
		});
	}

	public function unsolved()
	{
		return $this->whereDoesntHave('answers', function ($answers) {
			return $answers->where('accepted', true);
		});
	}
}