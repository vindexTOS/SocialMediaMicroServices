import { Controller, Post, Body } from '@nestjs/common';
import { ClientProxy } from '@nestjs/microservices';
import { Inject } from '@nestjs/common';

@Controller()
export class AppController {
  constructor(@Inject('CHAT_SERVICE') private readonly client: ClientProxy,    @Inject('USER_SERVICE') private readonly userClient: ClientProxy,) {}

  @Post('send')
  async sendMessage(@Body() data: any) {
         await this.client.emit('chat', { hello: 'world' });
        return { status: 'Message sent' };
  }



@Post("laravel")
async sendLaravel(@Body() data:any){
  await this.userClient.emit('user-update', { hello: 'laravel' });

    return {status:"laravel got"}
}
}
