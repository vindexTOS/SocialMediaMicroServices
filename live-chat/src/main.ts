import { NestFactory } from '@nestjs/core';
import { AppModule } from './app.module';
import { MicroserviceOptions, Transport } from '@nestjs/microservices';

async function bootstrap() {
  const app = await NestFactory.createMicroservice<MicroserviceOptions>(AppModule, {
    transport: Transport.RMQ,
    options: {
      urls: ['amqp://guest:guest@localhost:5672/'],
      queue: 'chat-queue',  // Listening to the queue where the API Gateway sends messages
      queueOptions: { durable: false } 
    },
  });
  await app.listen();
  console.log('Chat Service Microservice is listening');
}
bootstrap();