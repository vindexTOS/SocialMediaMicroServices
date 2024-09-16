import { Injectable } from '@nestjs/common';
import { MessagePattern, Payload, Ctx, RmqContext } from '@nestjs/microservices';

@Injectable()
export class AppService {
  @MessagePattern('chat')
  handleChatMessage(@Payload() data: any, @Ctx() context: RmqContext) {
    const channel = context.getChannelRef();
    const originalMessage = context.getMessage();
    
    try {
      console.log('Received message:', data);
      // Process your message here
      
      channel.ack(originalMessage); // Acknowledge message after successful processing
      return { status: 'Message processed' };
    } catch (error) {
      console.error('Message processing failed:', error);
      channel.nack(originalMessage); // Reject message if processing fails
    }
  }
}