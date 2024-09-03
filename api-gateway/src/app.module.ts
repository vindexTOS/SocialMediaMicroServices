import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { HttpModule } from '@nestjs/axios';
import { LaravelControllerController } from './modules/laravel-module/laravel-controller/laravel-controller.controller';
import { LaravelServiceService } from './modules/laravel-module/laravel-service/laravel-service.service';

@Module({
  imports: [HttpModule],
  controllers: [AppController, LaravelControllerController],
  providers: [AppService,   LaravelServiceService],
})
export class AppModule {}
