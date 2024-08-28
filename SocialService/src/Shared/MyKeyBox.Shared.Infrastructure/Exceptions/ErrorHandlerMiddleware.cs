using Humanizer;
using Microsoft.AspNetCore.Http;
using Microsoft.Extensions.Logging;
using MyKeyBox.Shared.Abstractions.Exception;

namespace MyKeyBox.Shared.Infrastructure;

internal class ErrorHandlerMiddleware:IMiddleware
{
    private readonly ILogger<ErrorHandlerMiddleware> _logger;
    public ErrorHandlerMiddleware(ILogger<ErrorHandlerMiddleware> logger)
    {
        _logger = logger;
    }

    public async Task InvokeAsync(HttpContext context, RequestDelegate next)
    {
        try
        {
            await next.Invoke(context);
        }
        catch (Exception exception)
        {
            var httpCode = 500;
            var code = "error";
            var message = "There was an error";
;            _logger.LogError(exception,exception.Message);
            if (exception is CustomException customException)
            {
                httpCode = 400;
                code = customException.GetType().Name.Underscore();
                message = customException.Message;
            }

            context.Response.StatusCode = httpCode;
            await context.Response.WriteAsJsonAsync(new {code = code, message});
        }
    }
}