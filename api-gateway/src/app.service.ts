import { Inject, Injectable } from '@nestjs/common';
import { ClientProxy } from '@nestjs/microservices';
import { catchError, Observable, tap, throwError } from 'rxjs';

@Injectable()
export class AppService {

  constructor(
    @Inject('CHAT_SERVICE') private readonly client: ClientProxy
  ) {}

  sendChatMessage(data: any): Observable<any> {
    console.log('Sending message:', data);
    return this.client.send('chat', data).pipe(
      tap((response) => console.log('Message sent response:', response)),
      catchError((error) => {
        console.error('Error sending message:', error);
        return throwError(error);
      })
    );
  }
 
  getHello(): string {
    return 'Hello World!';
  }
}
