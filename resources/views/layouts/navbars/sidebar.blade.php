<div class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="width: 280px;">
  <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
    <svg class="bi me-2" width="30" height="24">
      <use xlink:href="#bootstrap" />
    </svg>
    <span class="fs-5 fw-semibold">Collapsible</span>
  </a>
  <ul class="list-unstyled ps-0">
    <li class="mb-1">
      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#post-collapse" aria-expanded="false">
        Post
      </button>
      <div class="collapse" id="post-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="{{ route('post.index') }}" class="link-dark rounded">List All Post</a></li>
          <li><a href="{{ route('post.create') }}" class="link-dark rounded">Create New Post</a></li>
        </ul>
      </div>
    </li>
    <li class="mb-1">
      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#category-collapse" aria-expanded="false">
        Category
      </button>
      <div class="collapse" id="category-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="{{ route('category.index') }}" class="link-dark rounded">List All Category</a></li>
          <li><a href="{{ route('category.create') }}" class="link-dark rounded">Create New Category</a></li>
        </ul>
      </div>
    </li>
    <li class="mb-1">
      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#construct-collapse" aria-expanded="false">
        Construct Article
      </button>
      <div class="collapse" id="construct-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">


        </ul>
      </div>
    </li>
    <li class="border-top my-3"></li>
    <li class="mb-1">
      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
        Account
      </button>
      <div class="collapse" id="account-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="#" class="link-dark rounded">New...</a></li>
          <li><a href="#" class="link-dark rounded">Profile</a></li>
          <li><a href="#" class="link-dark rounded">Settings</a></li>
          <li><a href="#" class="link-dark rounded">Sign out</a></li>
        </ul>
      </div>
    </li>
  </ul>
</div>