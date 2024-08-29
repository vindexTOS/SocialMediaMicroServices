using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.DependencyInjection;
using MyKeyBox.Module.DealershipOffice.Core.DAL.Repositories;
using MyKeyBox.Module.DealershipOffice.Core.Repositories;
using MyKeyBox.Modules.BackOffice.Core.Repositories;
using MyKeyBox.Shared.Infrastructure.Persistence;

namespace MyKeyBox.Module.DealershipOffice.Core.DAL;

internal static class Extensions
{
    public static IServiceCollection AddDatabase(this IServiceCollection collection)
    {
        collection.AddDbContext<BackOfficeDbContext>(options =>
        {
            options.UseSqlServer("Data source=.; Initial Catalog=MyKeyBox_New;Integrated Security = SSPI;Trust Server Certificate=True");
        });
        collection.AddScoped<IDealershipOfficeRepository, DealershipOfficeRepository>();
        collection.AddScoped<ILockerRepository,LockerRepository>();
        collection.AddScoped<IBoxRepository,BoxRepository>();
        collection.AddScoped<IUnitOfWork>(serviceProvider=> serviceProvider.GetRequiredService<BackOfficeDbContext>());
        return collection;
    }
}