 import { LaravelServiceService } from '../laravel-service/laravel-service.service';
import { Controller, Get, HttpException, HttpStatus } from '@nestjs/common';
@Controller('laravel-controller')
export class LaravelControllerController {

    constructor(private readonly laravelService: LaravelServiceService) {}

  @Get("post")
  async getPosts() {
    try {
      const posts = await this.laravelService.getPosts().toPromise();
      return posts;
    } catch (error) {
   
      throw new HttpException('Failed to fetch posts from Laravel', HttpStatus.BAD_GATEWAY);
    }
  }
}
