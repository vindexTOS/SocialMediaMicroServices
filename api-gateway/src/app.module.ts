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
          urls: ['amqps://iuhpkzji:WXThgXLF5H3SfM4RhQYOfNPBplz9xeKI@shrimp.rmq.cloudamqp.com/iuhpkzji'],
          queue: 'chat-queue',  // Queue name to which messages are sent
          queueOptions: { durable: false },
        },
      },
    ]),
  ],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}