import { Module } from '@nestjs/common';
import { ClientsModule, Transport } from '@nestjs/microservices';
import { AppController } from './app.controller';
import { AppService } from './app.service';

@Module({
  imports: [
    ClientsModule.register([
      {
        name: 'CHAT_SERVICE',  // The name used for dependency injection
        transport: Transport.RMQ,
        options: {
          urls: ['amqp://guest:guest@localhost:5672/'],
          queue: 'chat-queue',  // Queue name to which messages are sent
          queueOptions: { durable: false },
        },
      },
      {
        name: 'USER_SERVICE',  // The name used for dependency injection
        transport: Transport.RMQ,
        options: {
          urls: ['amqp://guest:guest@localhost:5672/'],
          queue: 'user-queue',  // Queue name for user service
          queueOptions: { durable: false },
        },
      },
    ]),
  ],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}