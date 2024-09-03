import { Injectable, HttpException, HttpStatus } from '@nestjs/common';
import { HttpService } from '@nestjs/axios';
import { map, catchError } from 'rxjs/operators';
import { Observable, throwError } from 'rxjs';
import { ConfigService } from '@nestjs/config';

@Injectable()
export class PostsService {
    private readonly laravelEndpoint: string;
    constructor(private readonly httpService: HttpService,     private readonly configService: ConfigService,) {


        this.laravelEndpoint = this.configService.get<string>('LARAVEL_ENDPOINT');
    }

    getPosts(): Observable<any> {
        return this.httpService.get(`${this.laravelEndpoint}post`)
       .pipe(
         map(response => response.data),
         catchError(error => throwError(() => new HttpException('Failed to fetch posts', HttpStatus.BAD_GATEWAY))),
       );
   }
    getPost(id:string):Observable<any>{

         return this.httpService.get(`${this.laravelEndpoint}post/${id}`).pipe(map(res => res.data), 
         catchError(error => throwError(()=> new HttpException('Failed to fetch post', HttpStatus.BAD_GATEWAY))  ))
    }
  
}
