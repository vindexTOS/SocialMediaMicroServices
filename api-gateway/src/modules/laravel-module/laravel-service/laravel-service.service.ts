import { Injectable, HttpException, HttpStatus } from '@nestjs/common';
import { HttpService } from '@nestjs/axios';
import { map, catchError } from 'rxjs/operators';
import { Observable, throwError } from 'rxjs';

@Injectable()
export class LaravelServiceService {
    constructor(private readonly httpService: HttpService) {}

   getPosts(): Observable<any> {
    return this.httpService.get('http://localhost:8000/api/post/')
      .pipe(
        map(response => response.data),
        catchError(error => throwError(() => new HttpException('Failed to fetch posts', HttpStatus.BAD_GATEWAY))),
      );
  }

   createPost(postData: any): Observable<any> {
    return this.httpService.post('http://localhost:8000/api/post/', postData)
      .pipe(
        map(response => response.data),
        catchError(error => throwError(() => new HttpException('Failed to create post', HttpStatus.BAD_GATEWAY))),
      );
  }
}
