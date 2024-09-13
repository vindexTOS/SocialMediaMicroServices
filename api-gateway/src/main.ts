import { NestFactory } from '@nestjs/core';
import { AppModule } from './app.module';
import { Transport } from '@nestjs/microservices';

async function bootstrap() {
  const httpApp = await NestFactory.create(AppModule);
  httpApp.setGlobalPrefix('api');
  httpApp.enableCors({ origin: '*' });
  await httpApp.listen(8000);
  console.log('HTTP server listening on port 8000');

  const microserviceApp = await NestFactory.createMicroservice(AppModule, { 
    transport: Transport.RMQ,
    options: {
      urls: ['amqps://iuhpkzji:WXThgXLF5H3SfM4RhQYOfNPBplz9xeKI@shrimp.rmq.cloudamqp.com/iuhpkzji'],
      queue: 'admin_queue',  // This can be used for receiving if required
      queueOptions: { durable: false },
    }
  });
  await microserviceApp.listen();
  console.log('Microservice is listening');
}

bootstrap()