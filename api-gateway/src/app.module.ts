import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { HttpModule } from '@nestjs/axios';
import { PostsService } from './modules/laravel-module/posts/posts.service';
import { PostsController } from './modules/laravel-module/posts/posts.controller';
import { ConfigModule } from '@nestjs/config';
import { ClientsModule, Transport } from '@nestjs/microservices';

@Module({
  imports: [
    ConfigModule.forRoot({
      isGlobal: true,
    }),
    HttpModule,
    ClientsModule.register([
      {
        name: 'PRODUCT_SERVICE',
        transport: Transport.RMQ,
        options: {
          urls: ['amqps://iuhpkzji:WXThgXLF5H3SfM4RhQYOfNPBplz9xeKI@shrimp.rmq.cloudamqp.com/iuhpkzji'],
          queue: 'main_queue',
          queueOptions: { durable: false },
        },
      },
    ]),

  ],
  controllers: [AppController, PostsController],
  providers: [AppService, PostsService],
})
export class AppModule {}