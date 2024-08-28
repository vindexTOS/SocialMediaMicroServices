using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.DependencyInjection;

namespace MyKeyBox.Shared.Infrastructure.Persistence.SSMS;


public static class Extension
{
    public static IServiceCollection AddSsms(this IServiceCollection collection)
    {
        var options = collection.GetOptions<SsmsOptions>("SSMS");
        collection.AddSingleton(options);
        return collection;
    }

    /*public static IServiceCollection AddSsms<T>(this IServiceCollection collection) where T : DbContext 
    {
        var options = collection.GetOptions<SsmsOptions>("SSMS");
        collection.AddDbContext<T>(x => x.UseSqlServer(options.ConnectionString));

        using var scope = collection.BuildServiceProvider().CreateScope();
        var dbContext = scope.ServiceProvider.GetRequiredService<T>();
        dbContext.Database.Migrate();
        
        return collection;
    }*/
}
