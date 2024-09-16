import { Controller } from '@nestjs/common';
import { EventPattern, MessagePattern, Payload } from '@nestjs/microservices';

@Controller()
export class AppController {
  @EventPattern('chat')  // Matching the 'chat' pattern sent by the API Gateway
 async handleChatMessage(@Payload() data: any) {
   await console.log('Received message:', data);
    // return { status: 'Message processed by Chat Service' };
  }
}