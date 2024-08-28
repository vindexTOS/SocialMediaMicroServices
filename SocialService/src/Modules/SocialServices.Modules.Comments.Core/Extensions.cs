using System.Runtime.CompilerServices;
using Microsoft.Extensions.DependencyInjection;
using SocialServices.Modules.Comments.Core.DAL;
 

[assembly:InternalsVisibleTo("SocialServices.Module.DealershipOffice.Api")]
 
namespace SocialServices.Modules.Comments.Core;

internal static class Extensions
{
    public static IServiceCollection AddCore(this IServiceCollection collection)
    {
        collection.AddScoped<IDealerShipOfficeService, DealerShipService>();
        collection.AddScoped<ILockerService, LockerService>();
        collection.AddScoped<IBoxService, BoxService>();
        collection.AddDatabase();
        return collection;
    }
}