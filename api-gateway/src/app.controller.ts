import { Body, Controller, Inject, Post } from '@nestjs/common';
 
import { ClientProxy,  } from '@nestjs/microservices';
import { Observable } from 'rxjs';
import { AppService } from './app.service';

@Controller()
export class AppController {
  constructor(private readonly appService: AppService) {}

  @Post('test')
  async notify(@Body() data: any) {
 
    await this.appService.sendChatMessage(data) 
    return { message: 'chat sent' };
  }

}
