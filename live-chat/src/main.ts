import { NestFactory } from '@nestjs/core';
import { AppModule } from './app.module';
import { MicroserviceOptions, Transport } from '@nestjs/microservices';

async function bootstrap() {
  const app = await NestFactory.createMicroservice<MicroserviceOptions>(AppModule, {
    transport: Transport.RMQ,
    options: {
      urls: ['amqps://iuhpkzji:WXThgXLF5H3SfM4RhQYOfNPBplz9xeKI@shrimp.rmq.cloudamqp.com/iuhpkzji'],
      queue: '_queue',
      queueOptions: { durable: false },
    },
  });
  await app.listen();
  console.log('CHAT-APP Microservice is listening');
}
bootstrap();