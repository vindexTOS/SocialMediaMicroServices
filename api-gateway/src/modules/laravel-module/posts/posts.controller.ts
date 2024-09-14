import {
  Controller,
  Get,
  HttpException,
  HttpStatus,
  Param,
} from '@nestjs/common';
import { PostsService } from './posts.service';
@Controller('laravel/post')
export class PostsController {
  constructor(private readonly postService: PostsService) {}

  @Get()
  async getPosts() {
    try {
      const posts = await this.postService.getPosts().toPromise();
      return posts;
    } catch (error) {
      throw new HttpException(
        'Failed to fetch posts from Laravel',
        HttpStatus.BAD_GATEWAY,
      );
    }
  }

  @Get(':id')
  async getPost(@Param() id: string) {
    try {
      const post = await this.postService.getPost(id).toPromise();
      return post;
    } catch (error) {
      throw new HttpException(
        'Failed to fetch posts from Laravel',
        HttpStatus.BAD_GATEWAY,
      );
    }
  }
}
