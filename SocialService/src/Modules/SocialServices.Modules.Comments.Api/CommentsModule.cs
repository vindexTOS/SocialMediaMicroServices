using System.Runtime.CompilerServices;
using Microsoft.Extensions.DependencyInjection;
// using MyKeyBox.Module.DealershipOffice.Core;

[assembly:InternalsVisibleTo("MyKeyBox.Bootstraper")]
namespace SicuakServuces.Module.Comments.Api;

public static class CommentsModule
{
    public static IServiceCollection AddComentsModule(this IServiceCollection collection)
    {
        collection.AddCore();
        return collection;
    }
}