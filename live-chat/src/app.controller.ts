import { Controller } from '@nestjs/common';
import { MessagePattern, Payload } from '@nestjs/microservices';

@Controller()
export class AppController {

  @MessagePattern('chat')
  handleNotification(@Payload() data: any) {
    console.log('Received notification:', data);
    return { status: 'chat processed' };
  }
}