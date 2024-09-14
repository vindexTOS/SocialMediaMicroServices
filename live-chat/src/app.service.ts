import { Injectable } from '@nestjs/common';
import { MessagePattern, Payload } from '@nestjs/microservices';

@Injectable()
export class AppService {
  @MessagePattern('chat')
  handleNotification(@Payload() data: any) {
    console.log('Received notification:', data);
    return { status: 'chat processed' };
  }
}