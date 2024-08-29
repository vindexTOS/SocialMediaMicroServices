using System.Runtime.CompilerServices;
using Microsoft.AspNetCore.Builder;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.DependencyInjection;
using SocialServices.Shared.Infrastructure.Persistence.SSMS;

[assembly:InternalsVisibleTo("SocialServices.Bootstraper")]
namespace SocialServices.Shared.Infrastructure;
internal static class Extensions
{
    public static IServiceCollection AddInfrastructure(this IServiceCollection collection)
    {
        collection.AddSingleton<ErrorHandlerMiddleware>();
        collection.AddSsms();
        return collection;
    }

    public static IApplicationBuilder UseInfrastructure(this IApplicationBuilder builder)
    {
        builder.UseMiddleware<ErrorHandlerMiddleware>();
        return builder;
    }

    public static T GetOptions<T>(this IServiceCollection collection,string sectionName) where T : new()
    {
        using var serviceProvider = collection.BuildServiceProvider();
        var configuration = serviceProvider.GetRequiredService<IConfiguration>();
        var section = configuration.GetSection(sectionName);
        var options = new T();
        section.Bind(options);
        return options;
    }
}