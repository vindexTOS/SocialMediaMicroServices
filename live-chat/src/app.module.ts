import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { ClientsModule, Transport } from '@nestjs/microservices';
@Module({
  imports: [
    ClientsModule.register([
      {
        name: 'PRODUCT_SERVICE',
        transport: Transport.RMQ,
        options: {
          urls: ['amqps://iuhpkzji:WXThgXLF5H3SfM4RhQYOfNPBplz9xeKI@shrimp.rmq.cloudamqp.com/iuhpkzji'],
          queue: 'admin_queue',  // Match this with the queue name used by sender
          queueOptions: { durable: false },
        },
      },
    ]),
  ],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}