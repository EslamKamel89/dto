<?php

namespace App\Http\Controllers\App;

use App\Dtos\BlogPostDto;
use App\Enums\BlogPostSource;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\BlogPostRequest;
use App\Http\Resources\App\BlogPostResource;
use App\Models\BlogPost;
use App\Services\Blog\BlogPostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogPostController extends Controller {
	public function __construct(
		protected BlogPostService $service
	) {
	}
	public function store( BlogPostRequest $request ) {
		$post = $this->service->store( dto: BlogPostDto::fromAppRequest( $request ) );
		return BlogPostResource::make( $post );
	}
	public function update( BlogPostRequest $request, BlogPost $blogPost ) {
		$post = $this->service->update(
			dto: BlogPostDto::fromAppRequest( $request ),
			blogPost: $blogPost,


		);
		return BlogPostResource::make( $post );
	}
}
