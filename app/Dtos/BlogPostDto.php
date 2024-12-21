<?php
namespace App\Dtos;

use App\Enums\BlogPostSource;
use App\Http\Requests\App\BlogPostRequest as AppBLogPostRequest;
use App\Http\Requests\Api\BlogPostRequest as ApiBLogPostRequest;
readonly class BlogPostDto {
	public function __construct(
		public string $title,
		public string $content,
		public ?BlogPostSource $source = null,
	) {
	}
	public static function fromAppRequest( AppBlogPostRequest $request ) {
		return new BlogPostDto(
			title: $request->validated( 'title' ),
			content: $request->validated( 'content' ),
			source: BlogPostSource::App,
		);
	}
	public static function fromApiRequest( ApiBlogPostRequest $request ) {
		return new BlogPostDto(
			title: $request->validated( 'payload.post.title' ),
			content: $request->validated( 'payload.post.body' ),
			source: BlogPostSource::Api,
		);
	}
}
