<template>
  <div class="list-group list-group-transparent mx-3 mb-3">
    <Link class="btn btn-primary py-2 mb-2" href="/questions/create">Ask Question</Link>

    <Link class="filter-list-item" href="/questions?filter=latest" :class="{'active': $page.url === '/questions?filter=latest'}">
      <svg style="height: 1.4rem" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
      <span class="text">
        Latest
      </span>
    </Link>
    <Link class="filter-list-item" href="/questions?filter=popular-this-week" :class="{'active': $page.url === '/questions?filter=popular-this-week'}">
      <svg style="height: 1.4rem" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path></svg>
      <span class="text">
        Popular This Week
      </span>
    </Link>
    <Link class="filter-list-item" href="/questions?filter=popular-all-time" :class="{'active': $page.url === '/questions?filter=popular-all-time'}">
      <svg style="height: 1.4rem" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path></svg>
      <span class="text">
        Popular All Time
      </span>
    </Link>
    <Link class="filter-list-item" href="/questions?filter=solved" :class="{'active': $page.url === '/questions?filter=solved'}">
      <svg style="height: 1.4rem" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
      <span class="text">
        Solved
      </span>
    </Link>
    <Link class="filter-list-item" href="/questions?filter=unsolved" :class="{'active': $page.url === '/questions?filter=unsolved'}">
      <svg style="height: 1.4rem" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
      <span class="text">
        Unsolved
      </span>
    </Link>
    <Link class="filter-list-item" href="/questions?filter=no-answers" :class="{'active': $page.url === '/questions?filter=no-answers'}">
      <svg style="height: 1.4rem" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
      <span class="text">
        No Answers Yet
      </span>
    </Link>
  </div>
</template>